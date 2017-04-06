<?php
  require_once('./db/Model.php');

  class Beleful_App {
	  static private $pdo;
	  var 
	  $shop_logo, $shop_name, $shop_addr, $shop_des, $shop_meal;
	  public function __construct()
	  {
		 self::$pdo = new Model();
	  }

	  /*
	  * @var id int 
	  */
	  public function get_shop_property( $shop_id )
	  {
		  $sql = self::$pdo 
		  -> find_by_fields('shops', array('id' => $shop_id ));

		  if ($sql ->rowCount() > 0 )
		  {
			  $fetch = $sql -> fetch();
			  $this -> shop_logo = $fetch['logo'];
			  $this -> shop_name = $fetch['name'];
			  $this -> shop_addr = $fetch['address'];
			  $this -> shop_des = $fetch['description'];
			  $this -> shop_meal = $fetch['meals_offered'];
		  } else {

		  }
	  }

	  /*
	  * @var 
	  */
	  public function get_shop()
	  {
		  $args = func_get_args();
		  //return count($args);
		  $query = self::$pdo -> find_by_sql("SELECT * FROM shops ORDER BY id DESC");
		  if ($query -> rowCount() > 0)
		  {
			  while( $fetch = $query -> fetch())
			  {
				?>
			   <div class="col-md-2">
            	<div class="thumbnail">
              <img src="./images/9.jpg" alt="Loading" class="img-responsive"
              style="max-width: 300px; width: 100%">
              <div class="caption">
                <h3><?php echo $fetch['name']?></h3>
                <p><?php echo $fetch['address']?></p>
                <p><a href="view?q=<?php echo $fetch['id'] . '-' . str_replace(' ', '-', strtolower($fetch['name']))?>" class="btn btn-primary" role="button">Browse</a> </p>
              </div>
				</div>
			</div>
				<?php
			  }
		  }   else {
			  echo "<h4 style='color: #ccc'>No Restaurants Added Yet </h4>";
		  }
	  }

	
  }
