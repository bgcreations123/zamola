<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Permission;

class PagesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('slug', 'pages');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'pages',
                'display_name_singular' => __('voyager::seeders.data_types.page.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.page.plural'),
                'icon'                  => 'voyager-file-text',
                'model_name'            => 'TCG\\Voyager\\Models\\Page',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        //Data Rows
        $pageDataType = DataType::where('slug', 'pages')->firstOrFail();
        $dataRow = $this->dataRow($pageDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'author_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.author'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.title'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'excerpt');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => __('voyager::seeders.data_rows.excerpt'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'body');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => __('voyager::seeders.data_rows.body'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.slug'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'slugify' => [
                        'origin' => 'title',
                    ],
                    'validation' => [
                        'rule'  => 'unique:pages,slug',
                    ],
                ],
                'order' => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'meta_description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.meta_description'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'meta_keywords');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.meta_keywords'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'status');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => __('voyager::seeders.data_rows.status'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'INACTIVE',
                    'options' => [
                        'INACTIVE' => 'INACTIVE',
                        'ACTIVE'   => 'ACTIVE',
                    ],
                ],
                'order' => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 11,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => __('voyager::seeders.data_rows.page_image'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 12,
            ])->save();
        }

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.pages'),
            'url'     => '',
            'route'   => 'voyager.pages.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-file-text',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 7,
            ])->save();
        }

        //Permissions
        Permission::generateFor('pages');

        //Content
        $about = Page::firstOrNew([
            'slug' => 'about',
        ]);
        if (!$about->exists) {
            $about->fill([
                'author_id' => 0,
                'title'     => 'About Us',
                'excerpt'   => 'This is about us tu',
                'body'      => '<p>Integer congue elit noin semper laoreet sed lectus orcil posuer nisal tempor se felis acm Pelentesque inyd urna. Integer vitae felis magn pec estibul nam rutrumc diam. Aliquam malesuada maurs etulg metu curabitur laoreet convallis nisal. Pellentes que bibendum dsras pol ttito don cursus ante vulputate. Teugiat mil justo faucibusn sd Integ elemen tuma volutpat vestibulm enim mi tincidunt. Lorem ipsum dolor sit amet consectetur lorem ipsum dolor sit amet elit sed do eiusmod tempor incididunt ut labore .</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpacd qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantiu mtotam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p><div class="row"><div class="col-md-6"><img class="post-img img-responsive" src="http://localhost:8000/storage/pages/October2019/11.jpg" alt="foto" width="400" height="280" /></div><div class="col-md-6"><img class="post-img img-responsive" src="http://localhost:8000/storage/pages/October2019/21.jpg" alt="foto" width="400" height="280" /></div></div><!-- end row --><p>Mniu veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpacd qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantiu mtotam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p><blockquote class="blockquote blockquote_mod-a typography-blockquote"><p>&ldquo; Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore et dolore magna aliqua enim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis aute dolor reprehenderit.&rdquo;</p></blockquote><p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt neque porro quisquam est qui dolorem ipsum quia dolor sed dui posit amets consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore.</p>',
                'image'            => null,
                'meta_description' => 'Yar Meta Description',
                'meta_keywords'    => 'Keyword1, Keyword2',
                'status'           => 'ACTIVE',
            ])->save();
        }

        $services = Page::firstOrNew([
            'slug' => 'services',
        ]);
        if (!$services->exists) {
            $services->fill([
                'author_id' => 0,
                'title'     => 'Services',
                'excerpt'   => 'Our services',
                'body'      => '<h2 class="ui-title-block" style="text-align: center;"><span class="ui-title-emphasis">Zamola specials</span>Our Services</h2><p style="text-align: center;">&nbsp;</p><table style="width: 100%; border-collapse: collapse; border-style: none;"><tbody><tr><td style="width: 33.3333%;"><h3 class="list-features-2__title ui-title-inner" style="box-sizing: border-box; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: \'Titillium Web\'; color: #333333; margin-top: 0px; margin-bottom: 10px; text-transform: uppercase; position: relative; padding-left: 15px;">FLY WITH US</h3><div class="list-features-2__description" style="box-sizing: border-box; height: 70px; margin-bottom: 15px; color: #777777; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px;">Aorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliquaLorem ipsum dolor sit</div></td><td style="width: 33.3333%;"><h3 class="list-features-2__title ui-title-inner" style="box-sizing: border-box; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: \'Titillium Web\'; color: #333333; margin-top: 0px; margin-bottom: 10px; text-transform: uppercase; position: relative; padding-left: 15px;">CARGO MOVING</h3><div class="list-features-2__description" style="box-sizing: border-box; height: 70px; margin-bottom: 15px; color: #777777; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px;">Aorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliquaLorem ipsum dolor sit</div></td><td style="width: 33.3333%;"><h3 class="list-features-2__title ui-title-inner" style="box-sizing: border-box; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: \'Titillium Web\'; color: #333333; margin-top: 0px; margin-bottom: 10px; text-transform: uppercase; position: relative; padding-left: 15px;">SMARTPHONE APP</h3><div class="list-features-2__description" style="box-sizing: border-box; height: 70px; margin-bottom: 15px; color: #777777; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px;">Aorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliquaLorem ipsum dolor sit</div></td></tr><tr><td style="width: 33.3333%;"><h3 class="list-features-2__title ui-title-inner" style="box-sizing: border-box; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: \'Titillium Web\'; color: #333333; margin-top: 0px; margin-bottom: 10px; text-transform: uppercase; position: relative; padding-left: 15px;">VEHICLE LEASING</h3><div class="list-features-2__description" style="box-sizing: border-box; height: 70px; margin-bottom: 15px; color: #777777; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px;">Aorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliquaLorem ipsum dolor sit</div></td><td style="width: 33.3333%;"><h3 class="list-features-2__title ui-title-inner" style="box-sizing: border-box; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: \'Titillium Web\'; color: #333333; margin-top: 0px; margin-bottom: 10px; text-transform: uppercase; position: relative; padding-left: 15px;">24/7 SUPPORT</h3><div class="list-features-2__description" style="box-sizing: border-box; height: 70px; margin-bottom: 15px; color: #777777; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px;">Aorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliquaLorem ipsum dolor sit</div></td><td style="width: 33.3333%;"><h3 class="list-features-2__title ui-title-inner" style="box-sizing: border-box; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 18px; line-height: normal; font-family: \'Titillium Web\'; color: #333333; margin-top: 0px; margin-bottom: 10px; text-transform: uppercase; position: relative; padding-left: 15px;">CARGO TRACKING</h3><div class="list-features-2__description" style="box-sizing: border-box; height: 70px; margin-bottom: 15px; color: #777777; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px;">Aorem ipsum dolor sit amet elit eiusmod tempor incididunt ut labore dolore magna aliquaLorem ipsum dolor sit</div></td></tr></tbody></table>',
                'image'            => null,
                'meta_description' => 'Yar Meta Description',
                'meta_keywords'    => 'Keyword1, Keyword2',
                'status'           => 'ACTIVE',
            ])->save();
        }

        $quote = Page::firstOrNew([
            'slug' => 'quote',
        ]);
        if (!$quote->exists) {
            $quote->fill([
                'author_id' => 0,
                'title'     => 'Get Quote',
                'excerpt'   => 'Get quote here in...',
                'body'      => '<section class="section-area"><form class="form-request form-request_mod-a ui-form block_right_pad" action="#" method="post"><div class="row"><div class="col-xs-12"><input type="text" class="form-control" placeholder="Full Name" /></div><div class="col-xs-12"><input type="email" class="form-control" placeholder="Email address" /></div></div><div class="row"><div class="col-sm-6"><div class="select-control"><select class="selectpicker"><option>Destination From....</option><option>1</option><option>2</option></select></div></div><div class="col-sm-6"><div class="select-control"><select class="selectpicker"><option>Destinatin To....</option><option>1</option><option>2</option></select></div></div></div><div class="row"><div class="col-sm-6"><div class="select-control"><select class="selectpicker"><option>Logistics Type</option><option>1</option><option>2</option></select></div></div><div class="col-sm-6"><input type="email" class="form-control" placeholder="Subject" /></div></div><div class="row"><div class="col-xs-12"><textarea class="form-control" rows="11" placeholder="message"></textarea> <button class="ui-form__btn btn btn-sm btn_mod-a btn-effect pull-right"><span class="btn__inner">request quote</span></button></div></div></form></section><div class="decor-4 decor-4_mod-b">&nbsp;</div>',
                'image'            => null,
                'meta_description' => 'Yar Meta Description',
                'meta_keywords'    => 'Keyword1, Keyword2',
                'status'           => 'ACTIVE',
            ])->save();
        }

        $faqs = Page::firstOrNew([
            'slug' => 'faqs',
        ]);
        if (!$faqs->exists) {
            $faqs->fill([
                'author_id' => 0,
                'title'     => 'FAQ\'s',
                'excerpt'   => 'Frequently Asked Questions',
                'body'      => '<div id="accordion-1" class="panel-group accordion"><div class="panel"><div class="panel-heading"><h3 class="panel-title ui-title-inner" style="box-sizing: border-box; font: 700 16px \'Titillium Web\'; color: #333333; margin-top: 0px; margin-bottom: 0px; text-transform: uppercase;">VENIAM QUIS NOSTRUD EXERCITATION ULLAMC</h3><div id="collapse-2" class="panel-collapse collapse in" style="box-sizing: border-box; color: #777777; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 300;"><div class="panel-body" style="box-sizing: border-box; padding: 10px 15px 0px 30px; border-top-color: #dddddd;"><p style="box-sizing: border-box; margin: 0px 0px 6px;">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Due aute irure dolor in reprehenderit in oluptate velit esse cillum.</p><p style="box-sizing: border-box; margin: 0px 0px 6px;">&nbsp;</p></div></div></div></div></div><div class="note text-center"><div id="accordion-1" class="panel-group accordion"><div class="panel"><div class="panel-heading"><h3 class="panel-title ui-title-inner" style="box-sizing: border-box; font: 700 16px \'Titillium Web\'; color: #333333; margin-top: 0px; margin-bottom: 0px; text-transform: uppercase; text-align: left;">VENIAM QUIS NOSTRUD EXERCITATION ULLAMC</h3><div id="collapse-2" class="panel-collapse collapse in" style="box-sizing: border-box; color: #777777; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 300;"><div class="panel-body" style="box-sizing: border-box; padding: 10px 15px 0px 30px; border-top-color: #dddddd;"><p style="box-sizing: border-box; margin: 0px 0px 6px; text-align: left;">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Due aute irure dolor in reprehenderit in oluptate velit esse cillum.</p><p style="box-sizing: border-box; margin: 0px 0px 6px;">&nbsp;</p></div></div></div></div></div></div><div class="note text-center"><div id="accordion-1" class="panel-group accordion"><div class="panel"><div class="panel-heading"><h3 class="panel-title ui-title-inner" style="box-sizing: border-box; font: 700 16px \'Titillium Web\'; color: #333333; margin-top: 0px; margin-bottom: 0px; text-transform: uppercase; text-align: left;">VENIAM QUIS NOSTRUD EXERCITATION ULLAMC</h3><div id="collapse-2" class="panel-collapse collapse in" style="box-sizing: border-box; color: #777777; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 300;"><div class="panel-body" style="box-sizing: border-box; padding: 10px 15px 0px 30px; border-top-color: #dddddd;"><p style="box-sizing: border-box; margin: 0px 0px 6px; text-align: left;">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Due aute irure dolor in reprehenderit in oluptate velit esse cillum.</p><p style="box-sizing: border-box; margin: 0px 0px 6px;">&nbsp;</p></div></div></div></div></div></div><div class="note text-center">If you didn&rsquo;t found the answer to your question here, Contact us&nbsp;<br />&amp; our representative will reply you as soon as poossible, usually within 24 hours!</div><div class="decor-3 text-center">&nbsp;</div><div class="text-center"><a class="btn-link btn-link_lg" href="home.html">get in touch</a></div>',
                'image'            => null,
                'meta_description' => 'Yar Meta Description',
                'meta_keywords'    => 'Keyword1, Keyword2',
                'status'           => 'ACTIVE',
            ])->save();
        }

        $contact = Page::firstOrNew([
            'slug' => 'contact',
        ]);
        if (!$contact->exists) {
            $contact->fill([
                'author_id' => 0,
                'title'     => 'Contact Us',
                'excerpt'   => 'Tell us what you desire as regards your luggages',
                'body'      => '<section class="section-form-request"><form class="form-request" method="post"><div class="row"><div class="col-sm-6"><input type="text" class="form-control" required="" placeholder="first Name" /></div><!-- end col --><div class="col-sm-6"><input type="text" class="form-control" required="" placeholder="last Name" /></div><!-- end col --></div><!-- end row --><div class="row"><div class="col-sm-6"><input type="email" class="form-control" required="" placeholder="Email address" /></div><!-- end col --><div class="col-sm-6"><input type="tel" class="form-control" required="" placeholder="phone no." /></div><!-- end col --></div><!-- end row --><div class="row"><div class="col-xs-12"><input type="text" class="form-control" required="" placeholder="Enquiry type / subject" /></div><!-- end col --></div><!-- end row --><div class="row"><div class="col-xs-12"><textarea class="form-control" required="" rows="19" placeholder="message"></textarea> <button class="btn btn_mod-a btn-sm btn-effect pull-right" type="button"><span class="btn__inner">send message</span></button></div><!-- end col --></div><!-- end row --></form><!-- end form-request --></section>',
                'image'            => null,
                'meta_description' => 'Yar Meta Description',
                'meta_keywords'    => 'Keyword1, Keyword2',
                'status'           => 'ACTIVE',
            ])->save();
        }
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
                'data_type_id' => $type->id,
                'field'        => $field,
            ]);
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
