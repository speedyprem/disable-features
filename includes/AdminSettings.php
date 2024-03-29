<?php declare( strict_types = 1 );

namespace DWF;

/**
 * Main plugin class.
 */
class AdminSettings {

    // Add the admin stylesheet file.
    public function dwf_admin_style() {
        wp_enqueue_style( 'dwun-admin-style', plugins_url( "css/admin-style.css", __FILE__ ) );
    }

    // Add in admin side panel.
    public function Admin_menu_dwnSettings() {
        add_options_page( 'Disable WordPress Features Settings', 'Disable Features', 'manage_options', 'disable-feature', [ $this, 'dwf_settings' ] );
    }

    // Add in admin settiings.
    public function dwf_settings() { 

        // Update the plugin settings.
        if ( isset( $_POST['submit-nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['submit-nonce'] ) ), 'submit_form' ) ) {    
            $dwf_settings = [
                'dxmlrpcswitch_value' => sanitize_text_field( $_POST[ 'dxmlrpcswitch' ] ),
                'hsotswitch_value' =>  sanitize_text_field( $_POST[ 'hsotswitch' ] ),
                'hwvnswitch_value' =>  sanitize_text_field( $_POST[ 'hwvnswitch' ] ),
                'dwbswitch_value' =>  sanitize_text_field( $_POST[ 'dwbswitch' ] ),
                'dwabswitch_value' =>  sanitize_text_field( $_POST[ 'dwabswitch' ] ),
                'dauswitch_value' =>  sanitize_text_field( $_POST[ 'dauswitch' ] ),
                'dcpmswitch_value' =>  sanitize_text_field( $_POST[ 'dcpmswitch' ] ),
				'dafswitch_value' =>  sanitize_text_field( $_POST[ 'dafswitch' ] ),
            ];

            update_option( 'dwf_settings', $dwf_settings );
        }

        if ( isset( $_POST['submit-nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['submit-nonce'] ) ), 'submit_form' ) ) {
            echo '<div class="updated notice notice-success is-dismissible below-h2" id="message"><p>Settings updated successfully. </p></div>';
        }
        // Get dwf settings values.
        $option_values = get_option( 'dwf_settings' );
?>
    <div class="clear"></div>
    <div class="wbcr-factory-page-header">
        <h1 style="color:#fff">Disable Features — Settings </h1>
    </div>

    <div class="tabordion">
        <section id="section1">
            <input type="radio" name="sections" id="option1" checked>
            <label for="option1">Settings
                <span class="dashicons dashicons-admin-generic"></span>
                <div class="wbcr-factory-tab__short-description">
                    General settings
                </div>
            </label>
            <article>
                <h2>Admin notifications</h2>
                <p>Do you know the situation, when some plugin offers you to update to premium, to collect technical data and shows many annoying notices? You are close these notices every now and again but they newly appears and interfere your work with WordPress. Even worse, some plugin’s authors delete “close” button from notices and they shows in your admin panel forever.</p>
                <form name="fm_dwun" method="POST">
                    <table>
                        <tbody>
                        <tr class="mlw-box-left">
                            <th scope="row">
                                <span for="dxmlrpcswitch">Disable XML-RPC </span><br>
                                <small>On sites running WordPress 3.5+, disable XML-RPC completely.</small>
                            </th>
                            <td>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="dxmlrpcswitch" class="onoffswitch-checkbox" id="dxmlrpcswitch" <?php if ( ! empty( $option_values['dxmlrpcswitch_value'] ) ) {
                                        echo "checked"; } ?>>
                                    <label class="onoffswitch-label" for="dxmlrpcswitch" style="background: none; width: 56px; border: none;padding: inherit;">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr class="mlw-box-left">
                            <th scope="row">
                                <span for="hsotswitch">Hide ‘Screen Options’ Tab </span><br>
                                <small>Remove the Screen Options menu at the top of admin pages.</small>
                            </th>
                            <td>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="hsotswitch" class="onoffswitch-checkbox" id="hsotswitch" <?php if ( ! empty( $option_values['hsotswitch_value'] ) ) {
                                        echo "checked"; } ?>>
                                    <label class="onoffswitch-label" for="hsotswitch" style="background: none; width: 56px; border: none;padding: inherit;">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr class="mlw-box-left">
                            <th scope="row">
                                <span for="hsotswitch">Hide WordPress Version Number </span><br>
                                <small>Remove the WordPress version number from the frontend site and feeds.</small>
                            </th>
                            <td>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="hwvnswitch" class="onoffswitch-checkbox" id="hwvnswitch" <?php if ( ! empty( $option_values['hwvnswitch_value'] ) ) {
                                        echo "checked"; } ?>>
                                    <label class="onoffswitch-label" for="hwvnswitch" style="background: none; width: 56px; border: none;padding: inherit;">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr class="mlw-box-left">
                            <th scope="row">
                                <span for="hsotswitch">Disable Blocks Widget </span><br>
                                <small>Disable the Blocks widgets and use the Classic Widgets</small>
                            </th>
                            <td>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="dwbswitch" class="onoffswitch-checkbox" id="dwbswitch" <?php if ( ! empty( $option_values['dwbswitch_value'] ) ) {
                                        echo "checked"; } ?>>
                                    <label class="onoffswitch-label" for="dwbswitch" style="background: none; width: 56px; border: none;padding: inherit;">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr class="mlw-box-left">
                            <th scope="row">
                                <span for="hsotswitch">Disable WordPress Admin Bar</span><br>
                                <small>Disable the WordPress Admin Bar for all users in the frontend.</small>
                            </th>
                            <td>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="dwabswitch" class="onoffswitch-checkbox" id="dwabswitch" <?php if ( ! empty( $option_values['dwabswitch_value'] ) ) {
                                        echo "checked"; } ?>>
                                    <label class="onoffswitch-label" for="dwabswitch" style="background: none; width: 56px; border: none;padding: inherit;">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr class="mlw-box-left">
                            <th scope="row">
                                <span for="hsotswitch">Disable Dashboard Welcome Panel</span><br>
                                <small>Remove the Welcome Panel from the Admin Dashboard</small>
                            </th>
                            <td>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="rdwpswitch" class="onoffswitch-checkbox" id="rdwpswitch" <?php if ( ! empty( $option_values['rdwpswitch_value'] ) ) {
                                        echo "checked"; } ?>>
                                    <label class="onoffswitch-label" for="rdwpswitch" style="background: none; width: 56px; border: none;padding: inherit;">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr class="mlw-box-left">
                            <th scope="row">
                                <span for="hsotswitch">Disable comments page in menu</span><br>
                                <small>Disable the comments page in admin menu in your site.</small>
                            </th>
                            <td>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="dcpmswitch" class="onoffswitch-checkbox" id="dcpmswitch" <?php if ( ! empty( $option_values['dcpmswitch_value'] ) ) {
                                        echo "checked"; } ?>>
                                    <label class="onoffswitch-label" for="dcpmswitch" style="background: none; width: 56px; border: none;padding: inherit;">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>
						<tr class="mlw-box-left">
                            <th scope="row">
                                <span for="hsotswitch">Disable Admin Footer</span><br>
                                <small>Disable the admin footer text.</small>
                            </th>
                            <td>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="dafswitch" class="onoffswitch-checkbox" id="dafswitch" <?php if ( ! empty( $option_values['dafswitch_value'] ) ) {
                                        echo "checked"; } ?>>
                                    <label class="onoffswitch-label" for="dafswitch" style="background: none; width: 56px; border: none;padding: inherit;">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="fm-footer">
                        <?php wp_nonce_field( 'submit_form', 'submit-nonce' ); ?>
                        <input type="submit" name="publish" id="publish" class="button button-primary" value="Save Changes">
                    </p>
                </form>
            </article>
        </section>
        
        <section id="section3">
            <input type="radio" name="sections" id="option3">
            <label for="option3">Support
                <span class="dashicons dashicons-admin-users"></span>
                <div class="wbcr-factory-tab__short-description">
                    Having Issues?
                </div>
            </label>
            <article>
                <h2>Need Support</h2>
                <div id="wbcr-clr-support-widget" class="wbcr-factory-sidebar-widget">
                    <p>
                        <strong>Do you want the plugin to improved and update?</strong>
                    </p>
                    <p>Help the author, leave a review on wordpress.org. Thanks to feedback, I will know that the plugin is really useful to you and is needed.</p>
                    <p><strong>Having Issues?</strong></p>
                    <div class="wbcr-clr-support-widget-body">
                        <p>
                            We provide free support for this plugin. If you are pushed with a problem, just create a new ticket. We will definitely help you!               </p>
                        <ul>
                            <li style="margin-top: 15px;background: #fff4f1;padding: 10px;color: #a58074;">
                                <span class="dashicons dashicons-warning"></span>
                                If you find a php error or a vulnerability in plugin, you can <a href="https://github.com/speedyprem/disable-features/issues" target="_blank" rel="noopener">raise an issue</a> in github.</li>
                        </ul>
                    </div>
                </div>
            </article>
        </section>
    </div>
    <?php }

}
