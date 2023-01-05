<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CollectionProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\DeveloperController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
 
Route::get('/', [FrontController::class,'index'])->name('index.page');
Route::post('contact_save', [FrontController::class,'contactSave'])->name('contact.save');

Route::get('about',[FrontController::class,'aboutPage'])->name('about.page');
Route::view('/services', 'services');
// Route::get('/product',[FrontController::class,'productPage'])->name('product.page');
Route::get('/ads/{id}',[FrontController::class,'adsPage'])->name('ads.page');
Route::post('/product_search',[FrontController::class,'productSearch'])->name('product.search');
Route::get('ads/details/{id}',[FrontController::class,'productDetailPage'])->name('productDetail.show');
Route::view('/train', 'training');
Route::view('/blog', 'blogs');
Route::view('/contact', 'contactus');
Route::view('/return', 'returnpolicy');
Route::view('/terms', 'tremsandcon');
Route::view('/faq', 'faq');
Route::view('/privacy', 'privacy');
Route::view('/blogdetails', 'blogdetails');
Route::view('/shipping', 'shipping');
Route::get('onsale',[FrontController::class,'salePage'])->name('sale.page');
Route::post('inquiry/save/{id}',[FrontController::class,'inquirySave'])->name('inquiry.save');
Route::get('/personalFeatures',[DeveloperController::class,'personalFeatures'])->name('personal.features');
Route::get('/commercialFeatures',[DeveloperController::class,'commercialFeatures'])->name('commercial.features');

// Route::view('/userdashboard', 'userdashboard');


// Route::view('/invoice', 'admin/invoice');


Route::get('/cart', [cartController::class,'index']);
Route::get('cartAdd/{id}',[cartController::class,'cartItem'])->name('cart.add');
Route::post('cartAddDetail',[cartController::class,'cartItemDetail'])->name('cart.addDetail');
Route::patch('update-cart', [cartController::class, 'cartUpdate'])->name('update.cart');
Route::delete('remove-from-cart', [cartController::class, 'cartRemove'])->name('remove.from.cart');


Route::get('/register', function () {
    if (session()->has('naturaltextileclothingUser')) {
            return redirect('myac');
    }else{
        return view('register');

    }
});




Route::get('/login', function () {
    if (session()->has('naturaltextileclothingUser')) {
            return redirect('myac');
    }else{
        return view('userlogin');

    }
});





Route::post('user_save',[UserController::class,'registerUser'])->name('user.save');
Route::get('logoutUser',[UserController::class,'logout'])->name('user.logout');
Route::post('user_auth',[UserController::class,'login'])->name('user.login');

 

//Admin


Route::get('/admin', function () {
    if (session()->has('dogLossProject')) {
            return redirect('dashboard');
    }else{
        return view('admin/login');

    }
});








Route::post('admin_auth',[AdminController::class,'login'])->name('admin.login');
Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');


//User Middleware
Route::group(['middleware'=>['UserCheckAuth']],function(){

    //Profile Page
    Route::get('/profile',[UserController::class,'profilePage']);
    Route::get('/user/ads/inquiry', [UserController::class,'inquiryShow'])->name('userAds.inquiry');
    //Pending Ads
    Route::get('/user/ads/pending', [UserController::class,'pendingAds'])->name('userAds.pending');
    //Active Ads
    Route::get('/user/ads/active', [UserController::class,'activeAds'])->name('userAds.active');
    //Pending Ads
    Route::get('/user/ads/inactive', [UserController::class,'inactiveAds'])->name('userAds.inactive');
    //Place Ads
    // Route::view('/placead', 'placead');
    Route::get('/deletePost',[PostController::class,'destroy'])->name('ads.destroy');
    Route::get('/adsPost',[PostController::class,'index'])->name('ads.index');
    Route::post('/ads/save',[PostController::class,'store'])->name('ads.store');
    Route::get('/post/{id}/edit',[PostController::class,'edit'])->name('ads.edit');
    Route::post('/post/{id}/update',[PostController::class,'update'])->name('ads.update');


    //Checkout
    Route::get('/checkout', [FrontController::class,'checkoutShow']);

    Route::post('saveOrders',[OrderController::class,'saveOrders'])->name('order.save');

    //Thankyout 
    Route::get('/order-received', [FrontController::class,'received']);

    //User Update
    Route::post('/user_update/{id}', [UserController::class,'update'])->name('user.update');

    //User Account
    Route::get('/myac', [UserController::class,'myAccount'])->name('user.myac');

    //Orders
    Route::get('orderDetails/{id}',[FrontController::class,'userOrderDetails'])->name('orderDetails.show');

    //Thank you
    Route::get('thanks',[FrontController::class,'userOrderDesc'])->name('orderDesc.show');

    Route::get('/subCategory',[FrontController::class,'getSubCat'])->name('subcat.list');

    Route::view('/payment', 'payment');
    Route::view('/personal', 'personal');
    Route::view('/commercial', 'commercial');


});   

//Admin Middleware

Route::group(['middleware'=>['AdminCheckAuth']],function(){

//Dashboard
Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

//Ads
// Route::view('/ads', 'admin/ads');
Route::get('/admin/ads',[AdsController::class,'index'])->name('admin.ads');
Route::get('/admin/ads/{id}/edit/',[AdsController::class,'edit'])->name('admin.adsEdit');
Route::post('/admin/ads/{id}/update/',[AdsController::class,'update'])->name('admin.adsUpdate');
Route::get('/admin/approve/{id}',[AdsController::class,'approve'])->name('ads.approve');
Route::get('/admin/pending/{id}',[AdsController::class,'pending'])->name('ads.pending');
Route::get('/admin/reject/{id}',[AdsController::class,'reject'])->name('ads.reject');
Route::post('/admin/featured/save',[AdsController::class,'adsFeaturedSave'])->name('adsFeatured.save');

Route::view('/addetails', 'admin/addetails');

//User
Route::get('/user', [UserController::class,'userListAdmin'])->name('userList.show');
Route::post('/userDelete', [UserController::class,'destroy'])->name('user.delete');
Route::get('/userInactive/{id}', [UserController::class,'inactive'])->name('user.inactive');
Route::get('/userActive/{id}', [UserController::class,'active'])->name('user.active');


//Contact
Route::post('/delete', [ContactController::class,'destroy'])->name('contact.delete');
Route::get('/msg', [ContactController::class,'contactMsgList'])->name('contactMsg.show');


//Order
Route::get('/order', [OrderController::class,'index'])->name('order.show');
Route::get('/orderShow/{id}', [OrderController::class,'orderShow'])->name('orderShow.show');
Route::post('order_delete',[OrderController::class,'destroy'])->name('order.delete');
Route::post('order_status{id}',[OrderController::class,'orderStatus'])->name('order.status');

    
//Blogs
Route::get('/blogadd', [BlogController::class,'create'])->name('blog.add');
Route::get('/bloglist', [BlogController::class,'index'])->name('blog.show');
Route::post('/blogsave', [BlogController::class,'store'])->name('blog.save');
Route::get('/blogedit/{id}', [BlogController::class,'edit'])->name('blog.edit');
Route::post('/blogupdate/{id}', [BlogController::class,'update'])->name('blog.update');

// Product
Route::get('/addpro', [ProductController::class,'index'])->name('product.add');
Route::post('product_save', [ProductController::class,'store'])->name('product.save');
Route::get('/products', [ProductController::class,'show'])->name('product.show');
Route::get('/editpro/{id}', [ProductController::class,'edit'])->name('product.edit');
Route::post('/updatepro/{id}', [ProductController::class,'update'])->name('product.update');
Route::post('/product_delete',[ProductController::class,'destroy'])->name('product.delete');

// Unit
Route::get('/units',[UnitController::class,'show'])->name('unit.show');
Route::post('/units_save',[UnitController::class,'store'])->name('unit.save');
Route::post('/units_delete',[UnitController::class,'destroy'])->name('unit.delete');
Route::post('/units_update',[UnitController::class,'update'])->name('unit.update');



// Brannd
Route::get('/brandadd', [brandController::class,'create'])->name('brand.add');
Route::get('/brandlist', [brandController::class,'index'])->name('brand.show');
Route::post('/brandsave', [brandController::class,'store'])->name('brand.save');
Route::get('/brandedit/{id}', [brandController::class,'edit'])->name('brand.edit');
Route::post('/brandupdate/{id}', [brandController::class,'update'])->name('brand.update');
Route::post('/brandDelete', [brandController::class,'destroy'])->name('brand.delete');



//Attributes
Route::get('/attributes',[AttributeController::class,'index'])->name('admin.attrShow');
Route::get('/addAttributes',[AttributeController::class,'create'])->name('admin.attrAdd');
Route::post('/addAttributes',[AttributeController::class,'store'])->name('attr.save');
Route::post('/attr_delete',[AttributeController::class,'destroy'])->name('attr.delete');
Route::get('/attr_edit/{id}', [AttributeController::class,'edit'])->name('attr.edit');
Route::post('/attr_update/{id}',[AttributeController::class,'update'])->name('attr.update');

// Category
Route::get('/category', [CategoryController::class,'index'])->name('admin.cat');
Route::get('/categoryShow', [CategoryController::class,'show'])->name('admin.catShow');

Route::post('category_save',[CategoryController::class,'store'])->name('cat.save');
Route::post('category_update',[CategoryController::class,'update'])->name('cat.update');
Route::post('category_delete',[CategoryController::class,'destroy'])->name('cat.delete');


// Sub Category
Route::get('/sub_cat', [SubCategoryController::class,'show'])->name('subCat.show');
Route::post('subCategory_save',[SubCategoryController::class,'store'])->name('subCat.save');
Route::post('subCategory_delete',[SubCategoryController::class,'destroy'])->name('subCat.delete');
Route::post('subCategory_update',[SubCategoryController::class,'update'])->name('subCat.update');


//Collection
Route::get('/collectionPage',[CollectionController::class,'index'])->name('collection.show');
Route::get('/collectionAdd',[CollectionController::class,'create'])->name('collection.add');
Route::post('/collectionsave',[CollectionController::class,'store'])->name('collection.save');
Route::get('/collectionedit/{id}',[CollectionController::class,'edit'])->name('collection.edit');
Route::post('/collectionupdate/{id}',[CollectionController::class,'update'])->name('collection.update');
Route::post('collectionDelete',[CollectionController::class,'destroy'])->name('collection.delete');

Route::get('/collectionProList/{id}',[CollectionProductController::class,'index'])->name('collectionPro.list');
Route::get('/collectionProAdd/{id}',[CollectionProductController::class,'create'])->name('collectionPro.add');
Route::post('/collectionProSave/{id}',[CollectionProductController::class,'store'])->name('collectionPro.save');
Route::post('collectionProDelete',[CollectionProductController::class,'destroy'])->name('collectionPro.delete');


});   