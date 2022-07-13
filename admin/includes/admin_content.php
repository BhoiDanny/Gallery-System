<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard
            <small>Subheading</small>
        </h1>

        <?php
        $user = Photos::findById(1);
        echo $user->size . "<br>";
        echo INCLUDES_PATH . "<br>";
        echo SITEROOT;
//
//        $user->create();
//
//        $users = User::findUserById($session->user_id);
//        echo $users->username . "<br>";
//        echo $users->password;
//            $user = User::findUserById(1);
//            $user->first_name = "Daniel";
//            if($user->update()) {
//                echo "Successful" . "<br>";
//                echo $db->connection->affected_rows;
//            } else {
//                echo "Failed";
//            };
//            $user = new User();
//            $properties = $user->grabProperties();
//            print_r($properties);
//
//           $object = implode("`,`", array_keys($properties));
//           $sec = join("`,`", array_keys($properties));
//           echo $object . "<br>";
//           echo $sec;
//
//           $food =  "Gun, Rice, Soup";
//           $foods = explode(", ", $food);
//           print_r($foods)
        ?>



        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->