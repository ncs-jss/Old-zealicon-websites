<ul class="nav" id="side-menu">
    <li>
        <a href="index.php"><i class="fa fa-star-o fa-fw"></i> Dashboard</a>
    </li>
    <?php if(isset($_SESSION['user']['isSuperAdmin']) && $_SESSION['user']['isSuperAdmin']){ ?>
    <li>
        <a href="societies.php"><i class="fa fa-info fa-fw"></i> Societies</a>
    </li>
    <li>
        <a href="registrations.php"><i class="fa fa-users fa-fw"></i> Registrations</a>
    </li>
    <?php } ?>
    <li>
        <a href="events.php"><i class="fa fa-rss fa-fw"></i> Events</a>
    </li>
    <li>
        <a href="winners.php"><i class="fa fa-gift fa-fw"></i> Winners</a>
    </li>
    <?php if(isset($_SESSION['user']['isSuperAdmin']) && $_SESSION['user']['isSuperAdmin']){ ?>

    <li>
        <a href="content.php"><i class="fa fa-edit fa-fw"></i> Content</a>
    </li>
    <li>
        <a href="approval.php"><i class="fa fa-key fa-fw"></i> Event Approvals</a>
    </li>
    <li>
        <a href="team.php"><i class="fa fa-fire fa-fw"></i> Team</a>
    </li>
  <li>
        <a href="contact.php"><i class="fa fa-phone fa-fw"></i> Contact Person(s)</a>
    </li>
   <li>
        <a href="display.php"><i class="fa fa-eraser fa-fw"></i> Display Content</a>
    </li>
    <?php } ?>
</ul>