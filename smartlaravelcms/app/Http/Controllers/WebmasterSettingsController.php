<?php

namespace App\Http\Controllers;

use App\ContactsGroup;
use App\Http\Requests;
use App\Menu;
use App\Permissions;
use App\Topic;
use App\WebmasterBanner;
use App\WebmasterSection;
use App\WebmasterSetting;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class WebmasterSettingsController extends Controller
{
    // Define Default Settings ID
    private $id = 1;

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (@Auth::user()->permissions != 0) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    public function edit()
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        $ParentMenus = Menu::where('father_id', '0')->orderby('row_no', 'asc')->get();
        $WebmasterBanners = WebmasterBanner::orderby('row_no', 'asc')->get();
        $ContactsGroups = ContactsGroup::orderby('id', 'asc')->get();
        $PermissionsGroups = Permissions::orderby('id', 'asc')->get();
        $SitePages = Topic::where('webmaster_id', 1)->orderby('row_no', 'asc')->get();

        $id = $this->getId();
        $WebmasterSetting = WebmasterSetting::find($id);
        if (!empty($WebmasterSetting)) {
            return view("backEnd.webmaster.settings", compact("WebmasterSetting", "GeneralWebmasterSections", "ParentMenus", "WebmasterBanners", "ContactsGroups", "SitePages", "PermissionsGroups"));

        } else {
            return redirect()->route('adminHome');
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id = 1 for default settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $this->getId();
        $WebmasterSetting = WebmasterSetting::find($id);
        if (!empty($WebmasterSetting)) {

            $WebmasterSetting->ar_box_status = $request->ar_box_status;
            $WebmasterSetting->en_box_status = $request->en_box_status;
            $WebmasterSetting->seo_status = $request->seo_status;
            $WebmasterSetting->analytics_status = $request->analytics_status;
            $WebmasterSetting->banners_status = $request->banners_status;
            $WebmasterSetting->inbox_status = $request->inbox_status;
            $WebmasterSetting->calendar_status = $request->calendar_status;
            $WebmasterSetting->settings_status = $request->settings_status;
            $WebmasterSetting->newsletter_status = $request->newsletter_status;
            $WebmasterSetting->members_status = 0; //$request->orders_status;
            $WebmasterSetting->orders_status = 0; //$request->orders_status;
            $WebmasterSetting->shop_status = 0; //$request->shop_status;
            $WebmasterSetting->shop_settings_status = 0; //$request->shop_settings_status;
            $WebmasterSetting->default_currency_id = 0; //$request->default_currency_id;
            $WebmasterSetting->languages_ar_status = $request->languages_ar_status;
            $WebmasterSetting->languages_en_status = $request->languages_en_status;
            $WebmasterSetting->languages_by_default = $request->languages_by_default;
            $WebmasterSetting->header_menu_id = $request->header_menu_id;
            $WebmasterSetting->footer_menu_id = $request->footer_menu_id;
            $WebmasterSetting->home_banners_section_id = $request->home_banners_section_id;
            $WebmasterSetting->home_text_banners_section_id = $request->home_text_banners_section_id;
            $WebmasterSetting->side_banners_section_id = $request->side_banners_section_id;
            $WebmasterSetting->contact_page_id = $request->contact_page_id;
            $WebmasterSetting->newsletter_contacts_group = $request->newsletter_contacts_group;
            $WebmasterSetting->new_comments_status = $request->new_comments_status;
            $WebmasterSetting->links_status = $request->links_status;
            $WebmasterSetting->register_status = $request->register_status;
            $WebmasterSetting->permission_group = $request->permission_group;
            $WebmasterSetting->api_status = $request->api_status;
            $WebmasterSetting->api_key = $request->api_key;
            $WebmasterSetting->home_content1_section_id = $request->home_content1_section_id;
            $WebmasterSetting->home_content2_section_id = $request->home_content2_section_id;
            $WebmasterSetting->home_content3_section_id = $request->home_content3_section_id;
            $WebmasterSetting->home_contents_per_page = $request->home_contents_per_page;
            $WebmasterSetting->latest_news_section_id = $request->latest_news_section_id;

            $WebmasterSetting->mail_driver = $request->mail_driver;
            $WebmasterSetting->mail_host = $request->mail_host;
            $WebmasterSetting->mail_port = $request->mail_port;
            $WebmasterSetting->mail_username = $request->mail_username;
            $WebmasterSetting->mail_password = $request->mail_password;
            $WebmasterSetting->mail_encryption = $request->mail_encryption;
            $WebmasterSetting->mail_no_replay = $request->mail_no_replay;
            $WebmasterSetting->nocaptcha_status = $request->nocaptcha_status;
            $WebmasterSetting->nocaptcha_secret = $request->nocaptcha_secret;
            $WebmasterSetting->nocaptcha_sitekey = $request->nocaptcha_sitekey;
            $WebmasterSetting->google_tags_status = $request->google_tags_status;
            $WebmasterSetting->google_tags_id = $request->google_tags_id;
            $WebmasterSetting->google_analytics_code = $request->google_analytics_code;

            $WebmasterSetting->login_facebook_status = $request->login_facebook_status;
            $WebmasterSetting->login_facebook_client_id = $request->login_facebook_client_id;
            $WebmasterSetting->login_facebook_client_secret = $request->login_facebook_client_secret;
            $WebmasterSetting->login_twitter_status = $request->login_twitter_status;
            $WebmasterSetting->login_twitter_client_id = $request->login_twitter_client_id;
            $WebmasterSetting->login_twitter_client_secret = $request->login_twitter_client_secret;
            $WebmasterSetting->login_google_status = $request->login_google_status;
            $WebmasterSetting->login_google_client_id = $request->login_google_client_id;
            $WebmasterSetting->login_google_client_secret = $request->login_google_client_secret;
            $WebmasterSetting->login_linkedin_status = $request->login_linkedin_status;
            $WebmasterSetting->login_linkedin_client_id = $request->login_linkedin_client_id;
            $WebmasterSetting->login_linkedin_client_secret = $request->login_linkedin_client_secret;
            $WebmasterSetting->login_github_status = $request->login_github_status;
            $WebmasterSetting->login_github_client_id = $request->login_github_client_id;
            $WebmasterSetting->login_github_client_secret = $request->login_github_client_secret;
            $WebmasterSetting->login_bitbucket_status = $request->login_bitbucket_status;
            $WebmasterSetting->login_bitbucket_client_id = $request->login_bitbucket_client_id;
            $WebmasterSetting->login_bitbucket_client_secret = $request->login_bitbucket_client_secret;

            $WebmasterSetting->dashboard_link_status = $request->dashboard_link_status;
            $WebmasterSetting->timezone = $request->timezone;

            $WebmasterSetting->updated_by = Auth::user()->id;
            $WebmasterSetting->save();

            // Update .env file
            $env_update = $this->changeEnv([
                'MAIL_DRIVER'   => $request->mail_driver,
                'MAIL_HOST'   => $request->mail_host,
                'MAIL_PORT'       => $request->mail_port,
                'MAIL_USERNAME'       => $request->mail_username,
                'MAIL_PASSWORD'       => $request->mail_password,
                'MAIL_ENCRYPTION'       => $request->mail_encryption,
                'NO_REPLAY_EMAIL'       => $request->mail_no_replay,
                'NOCAPTCHA_STATUS'       => $request->nocaptcha_status,
                'NOCAPTCHA_SECRET'       => $request->nocaptcha_secret,
                'NOCAPTCHA_SITEKEY'       => $request->nocaptcha_sitekey,
                'DEFAULT_LANGUAGE'       => $request->languages_by_default,
                'FRONTEND_PAGINATION'       => $request->home_contents_per_page,
                'FACEBOOK_STATUS'       => $request->login_facebook_status,
                'FACEBOOK_ID'       => $request->login_facebook_client_id,
                'FACEBOOK_SECRET'       => $request->login_facebook_client_secret,
                'TWITTER_STATUS'       => $request->login_twitter_status,
                'TWITTER_ID'       => $request->login_twitter_client_id,
                'TWITTER_SECRET'       => $request->login_twitter_client_secret,
                'GOOGLE_STATUS'       => $request->login_google_status,
                'GOOGLE_ID'       => $request->login_google_client_id,
                'GOOGLE_SECRET'       => $request->login_google_client_secret,
                'LINKEDIN_STATUS'       => $request->login_linkedin_status,
                'LINKEDIN_ID'       => $request->login_linkedin_client_id,
                'LINKEDIN_SECRET'       => $request->login_linkedin_client_secret,
                'GITHUB_STATUS'       => $request->login_github_status,
                'GITHUB_ID'       => $request->login_github_client_id,
                'GITHUB_SECRET'       => $request->login_github_client_secret,
                'BITBUCKET_STATUS'       => $request->login_bitbucket_status,
                'BITBUCKET_ID'       => $request->login_bitbucket_client_id,
                'BITBUCKET_SECRET'       => $request->login_bitbucket_client_secret,
                'TIMEZONE'       => $request->timezone

            ]);


            return redirect()->action('WebmasterSettingsController@edit')
                ->with('doneMessage', trans('backLang.saveDone'))
                ->with('active_tab', $request->active_tab);
        } else {
            return redirect()->route('adminHome');
        }
    }


    public function changeEnv($data = array()){
        if(count($data) > 0){

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){

                // Loop through .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }

}
