<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        // Site Settings

        $setting = $this->findSetting('site.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.title'),
                'value'        => 'Zamola Enterprise ltd',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.description'),
                'value'        => 'Logistics Tracking Business',
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.logo');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.logo'),
                'value'        => 'settings/site/logo.png',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.phone');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site Phone',
                'value'        => '+1-778-455-2030',
                'details'      => '',
                'type'         => 'text',
                'order'        => 4,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.email');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site Email',
                'value'        => 'info@zamola.ca',
                'details'      => '',
                'type'         => 'text',
                'order'        => 5,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.address');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site Address',
                'value'        => '54 NewHill Station Ave CA',
                'details'      => '',
                'type'         => 'text',
                'order'        => 6,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.branch');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site Branch',
                'value'        => 'Branch 1',
                'details'      => '',
                'type'         => 'text',
                'order'        => 7,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.slogan');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Site Slogan',
                'value'        => '24/7 Express Logistics',
                'details'      => '',
                'type'         => 'text',
                'order'        => 8,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.summery');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Summery',
                'value'        => '<p style="box-sizing: border-box; margin: 0px 0px 25px; line-height: 1.74; color: #999999; font-family: Lato, Helvetica, Arial, sans-serif;">Our vision is our motivation, and it is the tireless spirit of the team that enables Zamola Enterprizes Ltd to make its place in the new markets. We want to be the logistics that people rely on and turn to, we intend to be the first choice for all shipping needs, but also we are empowering ourselves to the idealized choices for career and investment opportunities.</p>
                    <p style="box-sizing: border-box; margin: 0px 0px 25px; line-height: 1.74; color: #999999; font-family: Lato, Helvetica, Arial, sans-serif;">With current vigor and zeal, we are looking at being the global benchmark for responsible business practice.</p>',
                'details'      => '',
                'type'         => 'rich_text_box',
                'order'        => 9,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.working-hours');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Working-hours',
                'value'        => 'MON - SUN : 12PM - 12AM',
                'details'      => '',
                'type'         => 'text',
                'order'        => 10,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.services-offered');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Services offered',
                'value'        => '<ul class="footer-list list-unstyled">
                                    <li class="footer-list__item"><a class="footer-list__link" href="services-1.html">Sea Freight</a></li>
                                    <li class="footer-list__item"><a class="footer-list__link" href="services-1.html">Road Transport</a></li>
                                    <li class="footer-list__item"><a class="footer-list__link" href="services-1.html">Air Freight</a></li>
                                    <li class="footer-list__item"><a class="footer-list__link" href="services-1.html">Railway Logistics</a></li>
                                    <li class="footer-list__item"><a class="footer-list__link" href="services-1.html">Packaging &amp; Storage</a></li>
                                    <li class="footer-list__item"><a class="footer-list__link" href="services-1.html">Warehousing</a></li>
                                    <li class="footer-list__item"><a class="footer-list__link" href="services-1.html">Door-2-Door Delivery</a></li>
                                    </ul>',
                'details'      => '',
                'type'         => 'rich_text_box',
                'order'        => 11,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.google_analytics_tracking_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.google_analytics_tracking_id'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 12,
                'group'        => 'Site',
            ])->save();
        }


        // Social Media Settings

        $setting = $this->findSetting('social-link.google');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Social-link Google',
                'value'        => 'https://google.com/name/',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'social-link',
            ])->save();
        }

        $setting = $this->findSetting('social-link.facebook');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Social-link Facebook',
                'value'        => 'https://facebook.com/name/',
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'social-link',
            ])->save();
        }

        $setting = $this->findSetting('social-link.instagram');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Social-link Instagram',
                'value'        => 'https://instagram.com/name/',
                'details'      => '',
                'type'         => 'text',
                'order'        => 3,
                'group'        => 'social-link',
            ])->save();
        }

        $setting = $this->findSetting('social-link.twitter');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Social-link Twitter',
                'value'        => 'https://twitter.com/name/',
                'details'      => '',
                'type'         => 'text',
                'order'        => 4,
                'group'        => 'social-link',
            ])->save();
        }

        $setting = $this->findSetting('social-link.linkedin');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Social-link Linkedin',
                'value'        => 'https://linkedin.com/name/',
                'details'      => '',
                'type'         => 'text',
                'order'        => 5,
                'group'        => 'social-link',
            ])->save();
        }

        $setting = $this->findSetting('social-link.vimeo');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Social-link Vimeo',
                'value'        => 'https://vimeo.com/name/',
                'details'      => '',
                'type'         => 'text',
                'order'        => 6,
                'group'        => 'social-link',
            ])->save();
        }


        // Admin Settings

        $setting = $this->findSetting('admin.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.title'),
                'value'        => 'Zamola',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.description'),
                'value'        => 'The Admin panel for Zamola Enterprize Ltd',
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.loader');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.loader'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.icon_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.icon_image'),
                'value'        => 'settings/site/logo.png',
                'details'      => '',
                'type'         => 'image',
                'order'        => 4,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.bg_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.background_image'),
                'value'        => 'settings/site/bg.jpg',
                'details'      => '',
                'type'         => 'image',
                'order'        => 5,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.google_analytics_client_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.google_analytics_client_id'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 6,
                'group'        => 'Admin',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
