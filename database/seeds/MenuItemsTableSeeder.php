<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $admin = Menu::where('name', 'admin')->firstOrFail();
        $frontend = Menu::where('name', 'frontend')->firstOrFail();

        // Admin menu seeds
        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.dashboard'),
            'url'     => '',
            'route'   => 'voyager.dashboard',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-boat',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        $humanresourceAdminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => 'Human Resource',
            'url'     => '',
            'route'   => '',
        ]);
        if (!$humanresourceAdminItem->exists) {
            $humanresourceAdminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-group',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.roles'),
            'url'     => '',
            'route'   => 'voyager.roles.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-lock',
                'color'      => null,
                'parent_id'  => $humanresourceAdminItem->id,
                'order'      => 1,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.users'),
            'url'     => '',
            'route'   => 'voyager.users.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => $humanresourceAdminItem->id,
                'order'      => 2,
            ])->save();
        }

        $configurationsAdminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => 'Configurations',
            'url'     => '',
            'route'   => '',
        ]);
        if (!$configurationsAdminItem->exists) {
            $configurationsAdminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-group',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.categories'),
            'url'     => '',
            'route'   => 'voyager.categories.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-categories',
                'color'      => null,
                'parent_id'  => $configurationsAdminItem->id,
                'order'      => 1,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => 'Packages',
            'url'     => '',
            'route'   => 'voyager.packages.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-treasure',
                'color'      => null,
                'parent_id'  => $configurationsAdminItem->id,
                'order'      => 2,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => 'Payment Methods',
            'url'     => '',
            'route'   => 'voyager.payment_methods.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-dollar',
                'color'      => null,
                'parent_id'  => $configurationsAdminItem->id,
                'order'      => 3,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => 'Shipment Categories',
            'url'     => '',
            'route'   => 'voyager.shipment_categories.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-edit',
                'color'      => null,
                'parent_id'  => $configurationsAdminItem->id,
                'order'      => 4,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => 'Statuses',
            'url'     => '',
            'route'   => 'voyager.statuses.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-lab',
                'color'      => null,
                'parent_id'  => $configurationsAdminItem->id,
                'order'      => 5,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('Clients'),
            'url'     => '',
            'route'   => 'voyager.clients.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-smile',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 5,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('Comments Ctrl'),
            'url'     => '',
            'route'   => 'voyager.comments.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-chat',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 6,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.media'),
            'url'     => '',
            'route'   => 'voyager.media.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-images',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 7,
            ])->save();
        }

        $toolsAdminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.tools'),
            'url'     => '',
        ]);
        if (!$toolsAdminItem->exists) {
            $toolsAdminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 9,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.menu_builder'),
            'url'     => '',
            'route'   => 'voyager.menus.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-list',
                'color'      => null,
                'parent_id'  => $toolsAdminItem->id,
                'order'      => 10,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.database'),
            'url'     => '',
            'route'   => 'voyager.database.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-data',
                'color'      => null,
                'parent_id'  => $toolsAdminItem->id,
                'order'      => 11,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.compass'),
            'url'     => '',
            'route'   => 'voyager.compass.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-compass',
                'color'      => null,
                'parent_id'  => $toolsAdminItem->id,
                'order'      => 12,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.bread'),
            'url'     => '',
            'route'   => 'voyager.bread.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-bread',
                'color'      => null,
                'parent_id'  => $toolsAdminItem->id,
                'order'      => 13,
            ])->save();
        }

        $adminItem = MenuItem::firstOrNew([
            'menu_id' => $admin->id,
            'title'   => __('voyager::seeders.menu_items.settings'),
            'url'     => '',
            'route'   => 'voyager.settings.index',
        ]);
        if (!$adminItem->exists) {
            $adminItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-settings',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 14,
            ])->save();
        }

        // Frontend menu seeds
        $frontendItem = MenuItem::firstOrNew([
            'menu_id' => $frontend->id,
            'title'   => 'Home',
            'url'     => '/home',
            'route'   => null,
        ]);
        if (!$frontendItem->exists) {
            $frontendItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        $frontendItem = MenuItem::firstOrNew([
            'menu_id' => $frontend->id,
            'title'   => 'About us',
            'url'     => '/about',
            'route'   => null,
        ]);
        if (!$frontendItem->exists) {
            $frontendItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }

        $servicesFrontendItem = MenuItem::firstOrNew([
            'menu_id' => $frontend->id,
            'title'   => 'Services',
            'url'     => '',
            'route'   => '',
        ]);
        if (!$servicesFrontendItem->exists) {
            $servicesFrontendItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }

        $frontendItem = MenuItem::firstOrNew([
            'menu_id' => $frontend->id,
            'title'   => 'Our Services',
            'url'     => '/services',
            'route'   => null,
        ]);
        if (!$frontendItem->exists) {
            $frontendItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => $servicesFrontendItem->id,
                'order'      => 1,
            ])->save();
        }

        $frontendItem = MenuItem::firstOrNew([
            'menu_id' => $frontend->id,
            'title'   => 'Get Quote',
            'url'     => '/quote',
            'route'   => null,
        ]);
        if (!$frontendItem->exists) {
            $frontendItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => $servicesFrontendItem->id,
                'order'      => 2,
            ])->save();
        }

        $frontendItem = MenuItem::firstOrNew([
            'menu_id' => $frontend->id,
            'title'   => 'FAQ\'s',
            'url'     => '/faqs',
            'route'   => null,
        ]);
        if (!$frontendItem->exists) {
            $frontendItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => $servicesFrontendItem->id,
                'order'      => 3,
            ])->save();
        }

        $frontendItem = MenuItem::firstOrNew([
            'menu_id' => $frontend->id,
            'title'   => 'Contact us',
            'url'     => '/contact',
            'route'   => null,
        ]);
        if (!$frontendItem->exists) {
            $frontendItem->fill([
                'target'     => '_self',
                'icon_class' => null,
                'color'      => null,
                'parent_id'  => null,
                'order'      => 4,
            ])->save();
        }
    }
}
