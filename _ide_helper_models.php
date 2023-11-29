<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\address
 *
 * @property int $id
 * @property int $id_customer
 * @property string $province
 * @property string $district
 * @property string $ward
 * @property string $address
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|address query()
 * @method static \Illuminate\Database\Eloquent\Builder|address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereIdCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|address whereWard($value)
 */
	class address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\comments
 *
 * @property int $id
 * @property int $id_product
 * @property int $id_user
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|comments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comments query()
 * @method static \Illuminate\Database\Eloquent\Builder|comments whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comments whereIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comments whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comments whereUpdatedAt($value)
 */
	class comments extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\customer
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|customer whereUpdatedAt($value)
 */
	class customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\order
 *
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int|null $Total_selling_price
 * @property int $Status
 * @property int $payment_method
 * @property int $province
 * @property int $district
 * @property int $ward
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|order query()
 * @method static \Illuminate\Database\Eloquent\Builder|order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereTotalSellingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|order whereWard($value)
 */
	class order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\orders_details
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details query()
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|orders_details whereUpdatedAt($value)
 */
	class orders_details extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\product
 *
 * @property int $id
 * @property int $id_category
 * @property string $name
 * @property int $quantity
 * @property string $description
 * @property string $export_price
 * @property int $Is_Active
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|product query()
 * @method static \Illuminate\Database\Eloquent\Builder|product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereExportPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereIdCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereUpdatedAt($value)
 */
	class product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\product_catergory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|product_catergory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|product_catergory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|product_catergory query()
 * @method static \Illuminate\Database\Eloquent\Builder|product_catergory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product_catergory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product_catergory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product_catergory whereUpdatedAt($value)
 */
	class product_catergory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\purchase
 *
 * @property int $id
 * @property string|null $date
 * @property string $Total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|purchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|purchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase whereUpdatedAt($value)
 */
	class purchase extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\purchase_detail
 *
 * @property int $id
 * @property int $id_purchase
 * @property int $id_product
 * @property int $quantity
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail query()
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail whereIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail whereIdPurchase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|purchase_detail whereUpdatedAt($value)
 */
	class purchase_detail extends \Eloquent {}
}

