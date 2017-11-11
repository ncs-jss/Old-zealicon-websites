
/* =======================================================
 *  ---- grid deform ----
 * script: Gerard Ferrandez - January 2013
 * Released under the MIT license
 * http://www.dhteumeuleu.com/LICENSE.html
 * ======================================================= */

"use strict";

(function () {
	var scr, ctx, pointer, points, planes, setup, over, overZoomed,
		size, radius, force, ngrid, npoints, nplanes;
	// ==== Points constructor ====
	var Points = function (x, y) {
		this.x  = Math.round((0.5 * (scr.width - (size * ngrid * setup.aspectRatio))) + x * setup.aspectRatio);
		this.y  = Math.round(0.5 * (scr.height - (size * ngrid)) + y);
		this.X  = this.x;
		this.Y  = this.y;
		this.vx = 0;
		this.vy = 0;
		this.d  = 0;
	}
	// ==== points Math ====
	Points.prototype.update = function () {
		var z, a, x, y,
			dx = pointer.X - this.x,
			dy = pointer.Y - this.y;
		this.d = Math.sqrt(dx * dx + dy * dy);
		if (this.d < radius) {
			z = this.d * force * (radius - this.d) / radius,
			a = Math.atan2(dy, dx);
			x = this.x + Math.cos(a) * z;
			y = this.y + Math.sin(a) * z;
		} else {
			x = this.x;
			y = this.y;
		}
		this.vx = (this.vx + (x - this.X) * setup.spring) * setup.friction;
		this.vy = (this.vy + (y - this.Y) * setup.spring) * setup.friction;
		this.X += this.vx;
		this.Y += this.vy;
	}
	// ==== Planes constructor ====
	var Plane = function (p0, p1, p2, p3) {
		this.p0  = p0;
		this.p1  = p1;
		this.p2  = p2;
		this.p3  = p3;
		this.img = false;
		this.url = "";
		this.d2  = 0;
		this.isLoading = false;
		this.width  = 0;
		this.height = 0;
		
	}
	// ==== compute z-index ====
	Plane.prototype.update = function () {
		this.zIndex = Math.max(this.p0.d, this.p1.d, this.p2.d, this.p3.d);
	}
	// ==== draw triangle ====
	Plane.prototype.drawTriangle = function (p0, p1, p2, up) {
		if (this.isLoading) {
			if (this.img.complete) {
				this.isLoading = false;
				this.width  = this.img.width;
				this.height = this.img.height;
				this.d2     = -this.width * this.height;
			}
		} else {
			var dx, dy, d;
			ctx.save();
			ctx.beginPath();
			ctx.moveTo(p0.X, p0.Y + up);
			ctx.lineTo(p1.X, p1.Y + up);
			ctx.lineTo(p2.X, p2.Y + up);
			ctx.closePath();
			// ---- clip ----
			ctx.clip();
			// ---- transformation matrix ----
			if (up > 0) {
				ctx.transform(
					(this.height * p0.X - this.height * p1.X) / this.d2, // m11
					(this.height * p0.Y - this.height * p1.Y) / this.d2, // m12
					(this.width  * p1.X - this.width  * p2.X) / this.d2, // m21
					(this.width  * p1.Y - this.width  * p2.Y) / this.d2, // m22
					 p0.X, // dx
					 p0.Y  // dy
				);
			} else {
				ctx.transform(
					(this.height * p2.X - this.height * p1.X) / this.d2, // m11
					(this.height * p2.Y - this.height * p1.Y) / this.d2, // m12
					(this.width  * p0.X - this.width  * p2.X) / this.d2, // m21
					(this.width  * p0.Y - this.width  * p2.Y) / this.d2, // m22
					 p0.X, // dx
					 p0.Y  // dy
				);
			}
			ctx.drawImage(this.img, 0, 0);
			ctx.restore();
		}
	}
	// ==== draw Plane ====
	Plane.prototype.draw = function () {
		// ---- path ----
		ctx.beginPath();
		ctx.moveTo(this.p0.X-1, this.p0.Y-1);
		ctx.lineTo(this.p1.X+1, this.p1.Y-1);
		ctx.lineTo(this.p2.X+1, this.p2.Y+1);
		ctx.lineTo(this.p3.X-1, this.p3.Y+1);
		ctx.closePath();
		// ---- fill color ----
		if (ctx.isPointInPath(pointer.X, pointer.Y)) {
			// ---- on mouse over ----
			over = this;
			if (this.img) scr.setCursor("pointer");
			else scr.setCursor("default");
		}
		var c = setup.intensity - (this.zIndex / scr.minSize * setup.intensity);
		ctx.fillStyle = "RGB(" + 
			Math.round(c * setup.color[0]) + "," + 
			Math.round(c * setup.color[1]) + "," + 
			Math.round(c * setup.color[2]) + ")";
		ctx.fill();
		if (this.img) {
			// ---- draw image ----
			this.drawTriangle(this.p0, this.p1, this.p2,  1);
			this.drawTriangle(this.p0, this.p2, this.p3, -1);
		}
	}
	/* ==== build grid ==== */
	var creatGrid = function () {
		// ---- dimensions ----
		var s   = 0.8 * scr.minSize;
		if (scr.width < scr.height) s = s / setup.aspectRatio;
		size    = s / ngrid;
		radius  = s / 3;
		// ---- create points ----
		points = [];
		for (var i = 0; i <= ngrid; i++) {
			for (var j = 0; j <= ngrid; j++) {
				points.push(
					new Points(
						size * j,
						size * i
					)
				);
			}
		}
		// ---- create grid ----
		planes = [];
		for (var i = 0; i < ngrid; i++) {
			for (var j = 0; j < ngrid; j++) {
				planes.push(
					new Plane(
						points[i + (ngrid + 1) * j],
						points[i + (ngrid + 1) * j + 1],
						points[i + (ngrid + 1) * (j + 1) + 1],
						points[i + (ngrid + 1) * (j + 1)]
					)
				);
			}
		}
		// ---- add grid content ----
		for (var i = 0; i < setup.content.length; i++) {
			var o = setup.content[i],
				p = planes[(o.y * 1) + ngrid * o.x];
			if (o.canvas) {
				// ---- dynamic canvas ----
				var cache = document.createElement('canvas');
				p.width = cache.width = o.w || 400;
				p.height = cache.height = o.h || 400;
				p.d2 = -p.width * p.height;
				var ict = cache.getContext('2d');
				o.canvas(ict);
				p.img = cache;
			} else {
				// ---- external image ----
				p.img = new Image();
				p.img.src = o.img;
				p.isLoading = true;
			}
			p.url = o.url || false;
		}
	}
	var click = function (e) {
		if (force == -setup.zoomMin) {
			if (over.img) {
				// ---- zoom in ----
				force = -setup.zoomMax;
				overZoomed = over;
			}
		} else {
			// ---- zoom out ----
			force = -setup.zoomMin;
			// ---- link ----
			if (over.url) {
				document.location.href = over.url;
			}
		}
	}
	/* ==== main loop ==== */
	var run = function () {
		// ---- clear screen ----
		ctx.clearRect(0, 0, scr.width, scr.height);
		// ---- zoom out ----
		if (over != overZoomed) force = -setup.zoomMin;
		// ---- update points ----
		for (var i = 0; i < npoints; i++) {
			points[i].update();
		}
		// ---- update grid ----
		for (var i = 0; i < nplanes; i++) {
			planes[i].update();
		}
		// ---- zIndex sorting ----
		planes.sort(function (p0, p1) {
			return p1.zIndex - p0.zIndex;
		});
		// ---- draw grid ----
		for (var i = 0; i < nplanes; i++) {
			planes[i].draw();
		}
		// ---- next frame ----
		requestAnimFrame(run);
	}
	/* ==== init script ==== */
	var init = function (s) {
		// ---- setup ----
		setup    = s;
		force    = -s.zoomMin;
		ngrid    = s.ngrid;
		npoints  = (ngrid + 1) * (ngrid + 1);
		nplanes  = ngrid * ngrid;
		// ---- canvas ----
		scr = new ge1doot.Screen({
			container: "screen",
			resize: function () {
				scr.minSize = Math.min(scr.width, scr.height);
				creatGrid();
			}
		});
		ctx = scr.ctx;
		scr.resize();
		// ---- pointer ----
		pointer = new ge1doot.Pointer({
			tap: click
		});
		pointer.X = scr.width  * 0.5;
		pointer.Y = scr.height * 0.5;
		// ---- start engine ----
		run();
	}
	return {
		// ---- launch script -----
		load : function (setup) {
			window.addEventListener('load', function () {
				init(setup);
			}, false);
		}
	}
})().load({
	/* ----- setup ----- */
	zoomMin: 1.5,
	zoomMax: 5,
	spring: 0.025,
	friction: 0.95,
	aspectRatio: 1.618,
	intensity: 255,
	color: [0,0,0],
	ngrid: 6,
	content: [
		{x:0, y:0, img:"assets/img/gallery/1.jpg"},
		{x:0, y:1, img:"assets/img/gallery/2.jpg"},
		{x:0, y:2, img:"assets/img/gallery/3.jpg"},
		{x:0, y:3, img:"assets/img/gallery/4.jpg"},
		{x:0, y:4, img:"assets/img/gallery/5.jpg"},
		{x:0, y:5, img:"assets/img/gallery/6.jpg"},
		{x:1, y:0, img:"assets/img/gallery/7.jpg"},
		{x:1, y:1, img:"assets/img/gallery/8.jpg"},
		{x:1, y:2, img:"assets/img/gallery/9.jpg"},
		{x:1, y:3, img:"assets/img/gallery/10.jpg"},
		{x:1, y:4, img:"assets/img/gallery/11.jpg"},
		{x:1, y:5, img:"assets/img/gallery/12.jpg"},
		{x:2, y:0, img:"assets/img/gallery/13.jpg"},
		{x:2, y:1, img:"assets/img/gallery/14.jpg"},
		{x:2, y:2, img:"assets/img/gallery/15.jpg"},
		{x:2, y:3, img:"assets/img/gallery/16.jpg"},
		{x:2, y:4, img:"assets/img/gallery/17.jpg"},
		{x:2, y:5, img:"assets/img/gallery/18.jpg"},
		{x:3, y:0, img:"assets/img/gallery/19.jpg"},
		{x:3, y:1, img:"assets/img/gallery/20.jpg"},
		{x:3, y:2, img:"assets/img/gallery/21.jpg"},
		{x:3, y:3, img:"assets/img/gallery/22.jpg"},
		{x:3, y:4, img:"assets/img/gallery/23.jpg"},
		{x:3, y:5, img:"assets/img/gallery/24.jpg"},
		{x:4, y:0, img:"assets/img/gallery/25.jpg"},
		{x:4, y:1, img:"assets/img/gallery/26.jpg"},
		{x:4, y:2, img:"assets/img/gallery/27.jpg"},
		{x:4, y:3, img:"assets/img/gallery/28.jpg"},
		{x:4, y:4, img:"assets/img/gallery/29.jpg"},
		{x:4, y:5, img:"assets/img/gallery/30.jpg"},
		{x:5, y:0, img:"assets/img/gallery/31.jpg"},
		{x:5, y:1, img:"assets/img/gallery/32.jpg"},
		{x:5, y:2, img:"assets/img/gallery/33.jpg"},
		{x:5, y:3, img:"assets/img/gallery/34.jpg"},
		{x:5, y:4, img:"assets/img/gallery/35.jpg"},
		{x:5, y:5, img:"assets/img/gallery/36.jpg"},
		
		
	]
});