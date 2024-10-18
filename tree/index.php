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
						<li> <a href="#"><img src="account.svg"><span>Child</span></a>
                            <ul class="disable">
                                <li><a href="#"><img src="account.svg"><span>Grand Child</span></a>
                                    <ul class="disable">
                                        <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a>
                                            <ul class="disable">
                                                <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> </li>
                                                <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> </li>
                                            </ul>
                                        </li>
                                        <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> 
                                            <ul class="disable">
                                                <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> </li>
                                                <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li> <a href="#"><img src="account.svg"><span>Grand Child</span></a>
                                    <ul class="disable">
                                        <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> 
                                            <ul class="disable">
                                                <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> </li>
                                                <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> </li>
                                            </ul>
                                        </li>
                                        <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a>
                                            <ul class="disable">
                                                <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> </li>
                                                <li> <a href="#"><img src="account.svg"><span>Great Grand Child</span></a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
            // Add event listener to each tree item for collapsible feature
            document.querySelectorAll('.tree li a').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    var childUl = this.parentElement.querySelector('ul');
                    if (childUl) {
                        childUl.classList.toggle('disable'); // Toggle visibility
                    }
                    e.stopPropagation(); // Prevent event bubbling
                });
            });
        </script>
    </body>
</html>