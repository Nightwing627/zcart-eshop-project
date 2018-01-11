<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Address\AddressRepository::class,
            \App\Repositories\Address\EloquentAddress::class
        );
        $this->app->singleton(
            \App\Repositories\Attribute\AttributeRepository::class,
            \App\Repositories\Attribute\EloquentAttribute::class
        );
        $this->app->singleton(
            \App\Repositories\AttributeValue\AttributeValueRepository::class,
            \App\Repositories\AttributeValue\EloquentAttributeValue::class
        );
        $this->app->singleton(
            \App\Repositories\Blog\BlogRepository::class,
            \App\Repositories\Blog\EloquentBlog::class
        );
        $this->app->singleton(
            \App\Repositories\Carrier\CarrierRepository::class,
            \App\Repositories\Carrier\EloquentCarrier::class
        );
        $this->app->singleton(
            \App\Repositories\Cart\CartRepository::class,
            \App\Repositories\Cart\EloquentCart::class
        );
        $this->app->singleton(
            \App\Repositories\Category\CategoryRepository::class,
            \App\Repositories\Category\EloquentCategory::class
        );
        $this->app->singleton(
            \App\Repositories\CategoryGroup\CategoryGroupRepository::class,
            \App\Repositories\CategoryGroup\EloquentCategoryGroup::class
        );
        $this->app->singleton(
            \App\Repositories\CategorySubGroup\CategorySubGroupRepository::class,
            \App\Repositories\CategorySubGroup\EloquentCategorySubGroup::class
        );
        $this->app->singleton(
            \App\Repositories\Coupon\CouponRepository::class,
            \App\Repositories\Coupon\EloquentCoupon::class
        );
        $this->app->singleton(
            \App\Repositories\Customer\CustomerRepository::class,
            \App\Repositories\Customer\EloquentCustomer::class
        );
        $this->app->singleton(
            \App\Repositories\Dispute\DisputeRepository::class,
            \App\Repositories\Dispute\EloquentDispute::class
        );
        $this->app->singleton(
            \App\Repositories\EmailTemplate\EmailTemplateRepository::class,
            \App\Repositories\EmailTemplate\EloquentEmailTemplate::class
        );
        $this->app->singleton(
            \App\Repositories\GiftCard\GiftCardRepository::class,
            \App\Repositories\GiftCard\EloquentGiftCard::class
        );
        $this->app->singleton(
            \App\Repositories\Inventory\InventoryRepository::class,
            \App\Repositories\Inventory\EloquentInventory::class
        );
        $this->app->singleton(
            \App\Repositories\Manufacturer\ManufacturerRepository::class,
            \App\Repositories\Manufacturer\EloquentManufacturer::class
        );
        $this->app->singleton(
            \App\Repositories\Message\MessageRepository::class,
            \App\Repositories\Message\EloquentMessage::class
        );
        $this->app->singleton(
            \App\Repositories\Order\OrderRepository::class,
            \App\Repositories\Order\EloquentOrder::class
        );
        $this->app->singleton(
            \App\Repositories\OrderStatus\OrderStatusRepository::class,
            \App\Repositories\OrderStatus\EloquentOrderStatus::class
        );
        $this->app->singleton(
            \App\Repositories\Packaging\PackagingRepository::class,
            \App\Repositories\Packaging\EloquentPackaging::class
        );
        $this->app->singleton(
            \App\Repositories\PaymentMethod\PaymentMethodRepository::class,
            \App\Repositories\PaymentMethod\EloquentPaymentMethod::class
        );
        $this->app->singleton(
            \App\Repositories\PaymentStatus\PaymentStatusRepository::class,
            \App\Repositories\PaymentStatus\EloquentPaymentStatus::class
        );
        $this->app->singleton(
            \App\Repositories\Profile\ProfileRepository::class,
            \App\Repositories\Profile\EloquentProfile::class
        );
        $this->app->singleton(
            \App\Repositories\Product\ProductRepository::class,
            \App\Repositories\Product\EloquentProduct::class
        );
        $this->app->singleton(
            \App\Repositories\Refund\RefundRepository::class,
            \App\Repositories\Refund\EloquentRefund::class
        );
        $this->app->singleton(
            \App\Repositories\Role\RoleRepository::class,
            \App\Repositories\Role\EloquentRole::class
        );
        $this->app->singleton(
            \App\Repositories\Shop\ShopRepository::class,
            \App\Repositories\Shop\EloquentShop::class
        );
        $this->app->singleton(
            \App\Repositories\Supplier\SupplierRepository::class,
            \App\Repositories\Supplier\EloquentSupplier::class
        );
        $this->app->singleton(
            \App\Repositories\Tax\TaxRepository::class,
            \App\Repositories\Tax\EloquentTax::class
        );
        $this->app->singleton(
            \App\Repositories\Ticket\TicketRepository::class,
            \App\Repositories\Ticket\EloquentTicket::class
        );
        $this->app->singleton(
            \App\Repositories\User\UserRepository::class,
            \App\Repositories\User\EloquentUser::class
        );
        $this->app->singleton(
            \App\Repositories\Warehouse\WarehouseRepository::class,
            \App\Repositories\Warehouse\EloquentWarehouse::class
        );

    }

}
