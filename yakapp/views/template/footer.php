<?php
$sessionuserData = $this->session->userdata('userlogin');
if(!empty($sessionuserData))
{
?>
<footer>
	<div class="vtFooter"><p>Developed by Neophron Technologies &nbsp;&copy; <?php echo date('Y'); ?>&nbsp;&nbsp;</p></div>
</footer>
<?php } else { ?>
<footer>
	
</footer>
<?php } ?>
<!--toggle-menu-->
<script>
$(document).ready(function(){
    $(".dropdown1").click(function (e) {
        $(".signout").toggle();
       // e.preventDefault();
    });
    $(document).click(function(e){
        if(!$(e.target).closest('.dropdown1, .signout').length){
            $(".signout").hide();
        }
    })
	$(".dropall").click(function(){
        $(".more-menu").toggle();
		return false;
    });
	$(".alignMiddle1").click(function(){
        $(".quickcreate-menu").toggle();
		return false;
    });
	$(".quicklist").click(function(){
        $(".recordNamesList").toggle(100);
		return false;
    });
	$(".settings").click(function(){
        $(".listViewSetting").toggle(100);
		return false;
    });
	$("#listViewPageJump").click(function(){
        $("#listViewPageJumpDropDown").toggle(100);
		return false;
    });
	
	 $('html').click(function(){
		$(".more-menu").hide();
		$(".quickcreate-menu").hide();
		$(".recordNamesList").hide();
		$(".istViewSetting").hide();
		$("#listViewPageJumpDropDown").hide();
    }); 
	
});
</script>
<!--toggle-menu-end-->
<script type="text/javascript">

			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-5').removeClass('active');
				});

			});

		</script>
<script type="text/javascript">

			function DropDown(el) {
				this.actions = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.actions.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var actions = new DropDown( $('#actions') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-5').removeClass('active');
				});

			});

		</script>
<script type="text/javascript">

			function DropDown(el) {
				this.allprod = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.allprod.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var actions = new DropDown( $('#allprod') );
				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-5').removeClass('active');
				});

			});

		</script>
<script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#con_dob" ).datepicker({	

      dateFormat: 'dd-mm-yy',	
	  changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }

);
    </script>
    <script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#con_sup_start_date" ).datepicker({	
dateFormat: 'dd-mm-yy',	
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }

);
    </script>
    <script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#con_sup_end_date" ).datepicker({	
dateFormat: 'dd-mm-yy',	
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }

);
    </script>
    <script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#exep_close_date" ).datepicker({  
	dateFormat: 'dd-mm-yy',	
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }

);
    </script>
