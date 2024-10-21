<?php

    require '../include/dbcon.php';
    if (!isset($_COOKIE["user_is_login"])) header("location: ../?error+=please+login!");
    $user_cookie = $_COOKIE['user_is_login'];
    
    $sql = "SELECT * FROM users WHERE username = '".decryptSt($user_cookie)."'";
    $query = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($query);

    function addItem($id){
    
        global $conn;
        $sql = "SELECT id, name FROM users WHERE join_by = '$id' AND id != 0 LIMIT 2";
        $query = mysqli_query($conn, $sql);
        $number = mysqli_num_rows($query);
        if($number > 0){
            $user = mysqli_fetch_assoc($query);
            // echo "<ul class='disable'>";
            echo "<ul>";
            for($x = 0; $x < $number; $x++){
                $name = $user['name'];
                $new_id = $user['id'];
                // echo $new_id;
                echo "<li><a href='#'><img><span>$name</span></a>".addItem($new_id)."</li>";
            }
            echo "</ul>";
        }
    
    }
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type"content="text/html; charset=utf-8"/>
		<meta name="viewport"content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<title>Binary Tree Structure</title>
		<link href="style.css"rel="stylesheet"type="text/css"/>
	</head>
	<body>
		<div class="container">
			<div class="row">
                <div class="tree">
                    <ul>
                        <li> <a href="#"><img><span><?=$user['name']?></span></a>
                            <?php addItem($user['id']); ?>                    
                        </li>
                    </ul>
					<!-- 
                                    <ul class="disable">
                                        <li> <a href="#"><img><span>Great Grand Child</span></a>
                                            <ul class="disable">
                                                <li> <a href="#"><img><span>Great Grand Child</span></a> </li>
                                                <li> <a href="#"><img><span>Great Grand Child</span></a> </li>
                                            </ul>
                                        </li>
                                        <li> <a href="#"><img><span>Great Grand Child</span></a> 
                                            <ul class="disable">
                                                <li> <a href="#"><img><span>Great Grand Child</span></a> </li>
                                                <li> <a href="#"><img><span>Great Grand Child</span></a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li> <a href="#"><img><span>Right Child</span></a>
                                    <ul class="disable">
                                        <li>
                                            
                                        
                                            
                                        
                                            <a href="#"><img><span>Great Grand Child</span></a> 
                                            <ul class="disable">
                                                <li> <a href="#"><img><span>Great Grand Child</span></a> </li>
                                                <li> <a href="#"><img><span>Great Grand Child</span></a> </li>
                                            </ul>




                                        </li>
                                        <li> 
                                            
                                        
                                        
                                            <a href="#"><img><span>Great Grand Child</span></a>
                                            <ul class="disable">
                                                <li> <a href="#"><img><span>Great Grand Child</span></a> </li>
                                                <li> <a href="#"><img><span>Great Grand Child</span></a> </li>
                                            </ul>




                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
        <script>
            // Add event listener to each tree item for collapsible feature
            document.querySelectorAll('.tree li a').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    // Get the entire tree starting from the root node
                    var allUls = document.querySelectorAll('.tree ul');
                    
                    // Close all the sibling nodes
                    allUls.forEach(function(siblingUl) {
                        siblingUl.classList.add('disable'); // Close all sibling and parent nodes
                    });

                    // Traverse up the tree to make sure all ancestors are open
                    var parentLi = this.closest('li'); // Get the closest parent li
                    while (parentLi) {
                        var parentUl = parentLi.closest('ul'); // Get the ul for each li
                        if (parentUl) {
                            parentUl.classList.remove('disable'); // Open parent ul
                        }
                        parentLi = parentLi.parentElement.closest('li'); // Move up the tree
                    }

                    // Open the clicked node
                    var childUl = this.parentElement.querySelector('ul');
                    if (childUl) {
                        childUl.classList.toggle('disable'); // Toggle visibility of child ul
                    }

                    e.stopPropagation(); // Prevent event bubbling
                });
            });
        </script>
    </body>
</html>