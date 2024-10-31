<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function wp_quick_admin_notice()
{
    add_thickbox();
    $sharelink_text_array_quick = array
    (
        "I use Quick Box - Onclick Popup Notification Box wordpress plugin from @xyzscripts and you should too.",
        "Quick Box - Onclick Popup Notification Box wordpress plugin from @xyzscripts is awesome",
        "Thanks @xyzscripts for developing such a wonderful Quick Box - Onclick Popup Notification Box wordpress plugin",
        "I was looking for a Quick Box - Onclick Popup Notification Box and I found this. Thanks @xyzscripts",
        "Its very easy to use Quick Box - Onclick Popup Notification Box wordpress plugin from @xyzscripts",
        "I installed Quick Box - Onclick Popup Notification Box from @xyzscripts,it works flawlessly",
        "Quick Box - Onclick Popup Notification Box wordpress plugin that i use works terrific",
        "I am using Quick Box - Onclick Popup Notification Box wordpress plugin from @xyzscripts and I like it",
        "The Quick Box - Onclick Popup Notification Box plugin from @xyzscripts is simple and works fine",
        "I've been using this Quick Box - Onclick Popup Notification Box plugin for a while now and it is really good",
        "Quick Box - Onclick Popup Notification Box wordpress plugin is a fantastic plugin",
        "Quick Box - Onclick Popup Notification Box wordpress plugin is easy to use and works great. Thank you!",
        "Good and flexible  Quick Box - Onclick Popup Notification Box plugin especially for beginners",
        "The best Quick Box - Onclick Popup Notification Box wordpress plugin I have used ! THANKS @xyzscripts",
    );
    $sharelink_text_quick = array_rand($sharelink_text_array_quick, 1);
    $sharelink_text_quick = $sharelink_text_array_quick[$sharelink_text_quick];
    $xyz_quickbox_link = admin_url('admin.php?page=quickbox-basic-settings&quickbox_blink=en');
    $xyz_quickbox_link = wp_nonce_url($xyz_quickbox_link,'quickbox_blink');
    $xyz_quickbox_notice = admin_url('admin.php?page=quickbox-basic-settings&quickbox_notice=hide');
    $xyz_quickbox_notice = wp_nonce_url($xyz_quickbox_notice,'quickbox_notice');
    echo '
	<script type="text/javascript">
			function xyz_qbx_shareon_tckbox(){
			tb_show("Share on","#TB_inline?width=500&amp;height=75&amp;inlineId=show_share_icons_qbx&class=thickbox");
		}
	</script>
	<div id="qbx_notice_td" class="error" style="color: #666666;margin-left: 2px; padding: 5px;line-height:16px;">
	<p>Thank you for using <a href="https://wordpress.org/plugins/quick-box-popup/" target="_blank"> Quickbox popup </a> plugin from <a href="https://xyzscripts.com/" target="_blank">xyzscripts.com</a>. Would you consider supporting us with the continued development of the plugin using any of the below methods?</p>
	<p>
	<a href="https://wordpress.org/support/plugin/quick-box-popup/reviews" class="button xyz_rate_btn" target="_blank">Rate it 5★\'s on wordpress</a>';
    if(get_option('xyz_credit_link')=="0")
        echo '<a href="'.$xyz_quickbox_link.'" class="button xyz_backlink_btn xyz_blink">Enable Backlink</a>';
        echo '<a class="button xyz_share_btn" onclick=xyz_qbx_shareon_tckbox();>Share on</a>
		<a href="https://xyzscripts.com/donate/5" class="button xyz_donate_btn" target="_blank">Donate</a>
	<a href="'.$xyz_quickbox_notice.'" class="button xyz_show_btn">Don\'t Show This Again</a>
	</p>
	<div id="show_share_icons_qbx" style="display: none;">
	<a class="button" style="background-color:#3b5998;color:white;margin-right:4px;margin-left:100px;margin-top: 25px;" href="http://www.facebook.com/sharer/sharer.php?u=http://xyzscripts.com/wordpress-plugins/quick-box-popup/&text='.$sharelink_text_quick.'" target="_blank">Facebook</a>
	<a class="button" style="background-color:#00aced;color:white;margin-right:4px;margin-left:20px;margin-top: 25px;" href="http://twitter.com/share?url=http://xyzscripts.com/wordpress-plugins/quick-box-popup/&text='.$sharelink_text_quick.'" target="_blank">Twitter</a>
	<a class="button" style="background-color:#007bb6;color:white;margin-right:4px;margin-left:20px;margin-top: 25px;" href="http://www.linkedin.com/shareArticle?mini=true&url=http://xyzscripts.com/wordpress-plugins/quick-box-popup/" target="_blank">LinkedIn</a>
	<a class="button" style="background-color:#dd4b39;color:white;margin-right:4px;margin-left:20px;margin-top: 25px;" href="https://plus.google.com/share?&hl=en&url=http://xyzscripts.com/wordpress-plugins/quick-box-popup/" target="_blank">google+</a>
	</div>
    </div>';

}
$quick_installed_date = get_option('popup_installed_date');
if ($quick_installed_date=="") {
    $quick_installed_date = time();
}
if($quick_installed_date < ( time() - (30*24*60*60)))
{
   if (get_option('xyz_quick_dnt_shw_notice') != "hide")
    {
        add_action('admin_notices', 'wp_quick_admin_notice');
    }
}
?>
