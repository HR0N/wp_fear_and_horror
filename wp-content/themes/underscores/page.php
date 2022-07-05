<?php





global $res, $users, $user_id, $users_bill, $cur_user;
$user_id = get_current_user_id();
$users = connectDB("SELECT * FROM `wp_users`");
$users_bill = connectDB("SELECT * FROM `wp_users_bill`");
$curcontracts = connectDB("SELECT * FROM `wp_user_contrcts` WHERE `user`=".$user_id);
$topup_requests = connectDB("SELECT * FROM `wp_user_topup`");
$withdraw_requests = connectDB("SELECT * FROM `wp_user_withdraw`");
array_map(function ($val){
    global $cur_user;
    if(get_current_user_id() == $val[0])
        $cur_user = [$val[0], $val[3], curBill()];
}, $users);


foreach ($users as $user001){   /* Check bill for any user. Add if haven't*/
    getUserBill($user001[0]);}
global $res, $users_bill;
$users = connectDB("SELECT * FROM `wp_users`");
$users_bill = connectDB("SELECT * FROM `wp_users_bill`");
function getUserBill($user_id){
    global $users_bill;
    $result = null;
    foreach($users_bill as $bill){
        if($bill[1] == $user_id){$result = $bill;}
    }
    if($result === null){createUserBill($user_id); $result = false;}
    return $result;
}
function createUserBill($user_id){
    insertDB("INSERT INTO `wp_users_bill`(`user`) VALUES (".$user_id.")");
}
function curBill(){
    global $users_bill;
    foreach ($users_bill as $bill){
        if($bill[1] == get_current_user_id()){return $bill[2];}
    }
}



/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div hidden class='data'
             data-users='<?= json_encode($users); ?>'
             data-bills='<?= json_encode($users_bill); ?>'
             data-curuser='<?= json_encode($cur_user); ?>'
             data-curcontracts='<?= json_encode($curcontracts); ?>'
             data-topupreqs='<?= json_encode($topup_requests); ?>'
             data-withdraw='<?= json_encode($withdraw_requests); ?>'
        >
            <span class="aside_ico1"><img src="./assets/images/aside_icons/ico1.png"></span>
        </div>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
