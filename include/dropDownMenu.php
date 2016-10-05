

<li class="treeview">
              <a href="#">
                <i class="fa fa-angle-left pull-left"></i><i class="fa fa-tasks"></i> <span>کسب و کار</span>
              </a>
              <ul class="treeview-menu tab">

                <li id=<?php echo basename($_SERVER['PHP_SELF']); ?> ><a href="insertBusiness.php"><i class="fa fa-circle-o"></i>ایحاد کسب و کار </a></li>

                <li id=<?php  basename($_SERVER['PHP_SELF']); ?> ><a href="myBusiness.php"><i class="fa fa-circle-o"></i> کسب و کارهای من </a></li>

                <li id=<?php  basename($_SERVER['PHP_SELF']); ?> > <a href="openBusiness.php"><i class="fa fa-circle-o"></i> کسب و کارهای آزاد </a></li>

                <li id=<?php  basename($_SERVER['PHP_SELF']); ?> ><a href="businessList.php"><i class="fa fa-circle-o"></i>لیست کسب و کارها </a></li>


              </ul>
              <ul class="treeview-menu">
     


              </ul>
            </li>
<script>
    var pgName = ( document.location.pathname.match(/[^\/]+$/)[0] );
    alert(pgName);
    $('#'+pgName).className= "acti";
    //document.getElementById(pgName).setAttribute('class' , 'activ');
    //document.getElementById(pgName).className('activ');

    /*$(document).ready(function() {
        $(".tab").click(function () {
            if(!$(this).hasClass('actie'))
            {
                //$(".tab.active").removeClass("active");
                $(this).addClass("actie");
            }
        });
    });*/

</script>
