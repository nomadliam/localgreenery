<footer>
	<a href="index.php">Home</a><?php if($_SESSION['user']['role'] == "ADMIN") echo ' - <a href="admin/">Admin Menu</a>'; ?>
	<br />Powered by LocalGreenery. &copy; 2012 Mash-Heads.
</footer>