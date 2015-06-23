<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="de" lang="de" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Onsite: {$ctx->getView()->getName()}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="generator" content="phpskeleton v1.0" />
		<meta name="copyright" content="(c) 2015 - Bastian Kraus" />
		<meta name="author" content="Bastian KRaus" />
		<meta name="robots" content="index, follow" />
		<meta name="keywords" content="{$view->getMetaKeywords()}" />
		<meta name="description" content="{$view->getMetaDescription()}" />
		
		<link rel="stylesheet" type="text/css" href="/inc/css/main.css" media="all" />
		
		<script type="text/javascript" src="/inc/js/main.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<div id="logo">
					<h1>PHP Project Skeleton</h1>
				</div>
				<nav>
					<ul>
						<li><a href="/account">Account</a></li>
						<li><a href="/billing">Billing &amp; Subscription</a></li>
						<li><a href="/channels">Channels</a></li>
						<li><a href="/moderation">Moderation</a></li>
						<li><a href="/login?logout=true">Logout</a></li>
					</ul>
				</nav>
			</header>
			
			<div id="document">
				{$body}
			</div>
			<footer>
				<p>&copy; 2015 by Bastian Kraus &lt;<a href="https://about.me/bastian.kraus">https://about.me/bastian.kraus</a>&gt;
			</footer>
		</div>
	</body>
</html>