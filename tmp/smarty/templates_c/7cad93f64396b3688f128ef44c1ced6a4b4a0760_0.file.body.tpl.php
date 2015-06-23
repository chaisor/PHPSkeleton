<?php /* Smarty version 3.1.24, created on 2015-06-19 07:52:06
         compiled from "/Users/basti/Documents/workspaces/onsite/onsite-ui/src/views/body.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18900405135583ae062f48f7_88759267%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cad93f64396b3688f128ef44c1ced6a4b4a0760' => 
    array (
      0 => '/Users/basti/Documents/workspaces/onsite/onsite-ui/src/views/body.tpl',
      1 => 1434633059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18900405135583ae062f48f7_88759267',
  'variables' => 
  array (
    'ctx' => 0,
    'view' => 0,
    'body' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5583ae06302107_21658683',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5583ae06302107_21658683')) {
function content_5583ae06302107_21658683 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18900405135583ae062f48f7_88759267';
echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="de" lang="de" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Onsite: <?php echo $_smarty_tpl->tpl_vars['ctx']->value->getView()->getName();?>
</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="generator" content="onsite-ui v0.1" />
		<meta name="copyright" content="© 2015 - POGO Systems" />
		<meta name="author" content="POGO Systems" />
		<meta name="robots" content="index, follow" />
		<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['view']->value->getMetaKeywords();?>
" />
		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['view']->value->getMetaDescription();?>
" />
		
		<link rel="stylesheet" type="text/css" href="/inc/css/onsite.css" media="all" />
		
		<?php echo '<script'; ?>
 type="text/javascript" src="/inc/js/onsite.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<div id="logo">
					<h1>OnSite - channelize your social media...</h1>
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
				<?php echo $_smarty_tpl->tpl_vars['body']->value;?>

			</div>
			<footer>
				<p>&copy; 2015 by waschtl
			</footer>
		</div>
	</body>
</html><?php }
}
?>