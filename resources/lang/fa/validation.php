<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => ":attribute باید پذیرفته شده باشد.",
    "active_url"       => "آدرس :attribute معتبر نیست",
    "after"            => ":attribute باید تاریخی بعد از :date باشد.",
    "alpha"            => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد.",
    "alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد.",
    "array"            => ":attribute باید شامل آرایه باشد.",
    "before"           => ":attribute باید تاریخی قبل از :date باشد.",
    "between"          => [
        "numeric" => ":attribute باید بین :min و :max باشد.",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد.",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد.",
        "array"   => ":attribute باید بین :min و :max آیتم باشد.",
    ],
    "boolean"          => "فیلد :attribute فقط میتواند صحیح و یا غلط باشد",
    "confirmed"        => ":attribute با تاییدیه مطابقت ندارد.",
    "date"             => ":attribute یک تاریخ معتبر نیست.",
    "date_format"      => ":attribute با الگوی :format مطاقبت ندارد.",
    "different"        => ":attribute و :other باید متفاوت باشند.",
    "digits"           => ":attribute باید :digits رقم باشد.",
    "digits_between"   => ":attribute باید بین :min و :max رقم باشد.",
    'dimensions'           => ':attribute ابعاد درستی ندارد',
    'distinct'             => 'مقدار :attribute تکراری است',
    "email"            => "فرمت :attribute معتبر نیست.",
    "exists"           => ":attribute انتخاب شده، معتبر نیست.",
    'file'                 => 'The :attribute must be a file.',
    "filled"           => "فیلد :attribute الزامی است",
    "image"            => " فیلد :attribute نامعتبر هست.",
    "in"               => ":attribute انتخاب شده، معتبر نیست.",
    'in_array'             => 'فیلد :attribute در :other موجود نیست.',
    "integer"          => ":attribute باید نوع داده ای عددی (integer) باشد.",
    "ip"               => ":attribute باید IP آدرس معتبر باشد.",
    'json'                 => 'فیلد :attribute باید JSON باشد.',
    "max"              => [
        "numeric" => ":attribute نباید بزرگتر از :max باشد.",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد.",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد.",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد.",
    ],
    "mimes"            => ":attribute باید یکی از فرمت های :values باشد.",
    'mimetypes'            => 'فیلد :attribute  باید یکی از انواع: :values باشد.',
    "min"              => [
        "numeric" => ":attribute نباید کوچکتر از :min باشد.",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد.",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد.",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد.",
    ],
    "name"        => "فیلد :attribute الزامی است",
    "family"      => "فیلد :attribute الزامی است",
    "not_in"           => ":attribute انتخاب شده، معتبر نیست.",
    "numeric"          => ":attribute باید شامل عدد باشد.",
    'present'              => 'فیلد :attribute باید موجود باشد.',
    "regex"            => ":attribute یک فرمت معتبر نیست",
    "required"         => "فیلد :attribute الزامی است",
    "required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    'required_unless'      => 'فید :attribute لازم است مگر اینکه :other  شامل :values باشد.',
    "required_with"    => ":attribute الزامی است زمانی که :values موجود است.",
    "required_with_all" => ":attribute الزامی است زمانی که :values موجود است.",
    "required_without" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست.",
    "same"             => ":attribute و :other باید مانند هم باشند.",
    "size"             => [
        "numeric" => ":attribute باید برابر با :size باشد.",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد.",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد.",
        "array"   => ":attribute باسد شامل :size آیتم باشد.",
    ],
    "string"           => "فیلد :attribute باید متنی باشد.",
    "timezone"         => "فیلد :attribute باید یک منطقه صحیح باشد.",
    "unique"           => ":attribute قبلا انتخاب شده است.",
    'uploaded'             => 'خطا در آپلود :attribute .',
    "url"              => "فرمت آدرس :attribute اشتباه است.",
    "video" => "فیلد :attribute الزامی است",
    "body" => "فیلد :attribute الزامی است",
    "iranianNationalCode" => "کد ملی نا معتبر است",
    "captcha" => "فیلد :attribute الزامی است",

    'jdate' => ':attribute تاریخ شمسی معتبر نمی باشد.',
    'jdate_equal' => ':attribute تاریخ شمسی برابر :fa-date نمی باشد.',
    'jdate_not_equal' => ':attribute تاریخ شمسی نامساوی :fa-date نمی باشد.',
    'jdatetime' => ':attribute تاریخ و زمان شمسی معتبر نمی باشد.',
    'jdatetime_equal' => ':attribute تاریخ و زمان شمسی مساوی :fa-date نمی باشد.',
    'jdatetime_not_equal' => ':attribute تاریخ و زمان شمسی نامساوی :fa-date نمی باشد.',
    'jdate_after' => ':attribute تاریخ شمسی باید بعد از :fa-date باشد.',
    'jdate_after_equal' => ':attribute تاریخ شمسی باید بعد یا برابر از :fa-date باشد.',
    'jdatetime_after' => ':attribute تاریخ و زمان شمسی باید بعد از :fa-date باشد.',
    'jdatetime_after_equal' => ':attribute تاریخ و زمان شمسی باید بعد یا برابر از :fa-date باشد.',
    'jdate_before' => ':attribute تاریخ شمسی باید قبل از :fa-date باشد.',
    'jdate_before_equal' => ':attribute تاریخ شمسی باید قبل یا برابر از :fa-date باشد.',
    'jdatetime_before' => ':attribute تاریخ و زمان شمسی باید قبل از :fa-date باشد.',
    'jdatetime_before_equal' => ':attribute تاریخ و زمان شمسی باید قبل یا برابر از :fa-date باشد.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

        'amount' => 'مبلغ',
        'mobile' => 'شماره همراه',
        'package' => 'نوع بسته',
        "name" => "نام",
        "family"=>"نام خانودگی",
        "username" => "نام کاربری",
        "email" => "پست الکترونیکی",
        "tel" => "تلفن",
        "fax" => "فکس",
        "agent" => "نماینده",
        "first_name" => "نام",
        "last_name" => "نام خانوادگی",
        "password" => "رمز عبور",
        "new_password" => "رمز عبور جدید",
        'last_password' => 'رمز عبور فعلی',
        "password_confirmation" => "تاییدیه ی رمز عبور",
        "new_password_confirmation" => "تاییدیه ی رمز عبور جدید",
        "city" => "شهر",
        "country" => "کشور",
        "address" => "نشانی",
        "phone" => "تلفن",
        "phoneNumber" => "شماره موبایل",
        "age" => "سن",
        "sex" => "جنسیت",
        "code" => "کد",
        "gender" => "جنسیت",
        "day" => "روز",
        "month" => "ماه",
        "year" => "سال",
        "hour" => "ساعت",
        "minute" => "دقیقه",
        "second" => "ثانیه",
        "title" => "عنوان",
        "text" => "متن",
        "roles" => "نقش ها",
        'status' => 'وضعیت',
        'active' => 'فعال',
        'inactive' => 'غیرفعال',
        'permissions' => 'دسترسی ها',
        'created_at'=>'تاریخ ایجاد',
        'updated_at'=>'تاریخ ویرایش',
        "content" => "محتوا",
        "description" => "توضیحات",
        "excerpt" => "چکیده",
        "date" => "تاریخ",
        "time" => "زمان",
        "available" => "موجود",
        "size" => "اندازه",
        'bill_id' => 'شناسه قبض',
        'payment_id' => 'شناسه پرداخت',
        'payment_method_id' => 'روش پرداخت',
        'machine_number' => 'تعداد دستگاه',
        'registered_at' => 'تاریخ سفارش',
        'machine_model_id' => 'مدل دستگاه',
        'spiral_id' => 'قطر مارپیچ',
        'system_control_id' => 'سیستم کنترل',
        'FOB_price' => 'قیمت FOB',
        'image' => 'تصویر',
        'video' => 'ویدئو',
        'body' => 'شرح کامل',
        'price' => 'قیمت',
        'file' => 'فایل',
        'captcha' => 'کد امنیتی',
        'machine_drive_id' => 'درایو',
        'machine_weight_id' => 'تناژ',
        'machine_series_id' => 'سری',
        'machine_type_id' => 'دسته بندی',
        'currency_id' => 'نوع ارز',
        'seller_id' => 'فروشنده',
        'order_name' => 'نام سفارش',
        'sum' => 'مبلغ کل سفارش',
        'order_id' => 'سفارش',
        'serial_number' => 'شماره سریال',
        'shipping_file' => 'پرونده حمل',
        'file_number' => 'شماره پرونده',
        'order_registration_code' => 'کد ثبت سفارش',
        'incoterm' => 'اینکوترمز',
        'proforma_number' => 'شماره پروفورما',
        'order_register_completion_date' => 'تاریخ تکمیل ثبت سفارش',
        'order_register_issue_date' => 'تاریخ صدور ثبت سفارش',
        'order_register_validity_date' => 'تاریخ اعتبار ثبت سفارش',

        'currency_allocate_application_date' => 'تاریخ درخواست تخصیص ارز',
        'currency_allocate_issue_date' => 'تاریخ صدور تخصیص ارز',
        'validity_currency_allotment_date' => 'تاریخ اعتبار تخصیص ارز',
        'bank_id' => 'بانک',
        'details.*' => 'آیتم',
        'machine_models.*.FOB_price' => 'قیمت FOB',
        'machine_models.*.machine_model_id' => 'مدل دستگاه',
        'machine_models.*.spiral_id' => 'قطر مارپیچ',
        'machine_models.*.system_control_id' => 'سیستم کنترل',
        'start_date' => 'تاریخ شروع',
        'expire_datetime' => 'تاریخ انقضا',
        'shipping_name' => 'نام کشتیرانی',
        'insurance_number' => 'شماره بیمه نامه',
        'freight_number' => 'شماره بارنامه',
        'freight_date' => 'تاریخ بارنامه',
        'arrival_notice_date' => 'تاریخ اعلامیه ورود',
        'release_date' => 'تاریخ ترخیص',
        'container_type' => 'نوع کانتینر',
        'unit_price' => 'قیمت واحد',
        'count' => 'تعداد',
        'total_price' => 'قیمت کل',
    ],

];
