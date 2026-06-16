
import { createI18n } from 'vue-i18n'

const messages = {
    ar: {
        "phone": "رقم الهاتف",
        "name": "اسم",
        "save_changes": "حفظ التغييرات",
        create_order: 'إنشاء طلب',
        tracking: 'تتبع الطلب',
        delivered: 'تم التسليم',
            dashboard: 'لوحة التحكم',
    orders: 'الطلبات',
    users: 'المستخدمين',
    user: 'المستخدم',
    couriers: 'المندوبين',
    courier: 'المندوب',
    customers: 'العملاء',
    customer: 'العميل',
    logout: 'تسجيل الخروج',
    login: 'تسجيل الدخول',
    create_order: 'إنشاء طلب',
    my_orders: 'طلباتي',
    tracking: 'تتبع الطلب',
    admin_panel: 'لوحة الإدارة',
    racking: 'تتبع الطلب',
    rested: 'تم التسليم',
    cancelled: 'تم الإلغاء',
    reset: 'إعادة تعيين',
    cancel: 'إلغاء',
    accept: 'قبول',
     reject: 'رفض',
     pending: 'قيد الانتظار',
     active: 'نشط',
     inactive: 'غير نشط',
     status: 'الحالة',
     order_status: 'حالة الطلب',
     user_status: 'حالة المستخدم',
     courier_status: 'حالة المندوب',
        order: 'طلب',
        price: 'السعر',
        weight: 'الوزن',
        distance: 'المسافة',
        action: 'الإجراء',
        actions: 'الإجراءات',
        arrived_destination: 'وصل إلى الوجهة',
        on_the_way: 'في الطريق',
        picked_up: 'تم الاستلام',
        courier_arrived: 'وصل المندوب للاستلام',
        dropoff: 'عنوان التسليم',
        pickup: 'عنوان الاستلام',
        app_name: 'علي للتوصيل السريع',

hero_title: 'شريكك الموثوق للتوصيل السريع في النيجر',
customer_subtitle: 'اطلب وتابع طلبات التوصيل بسهولة',
courier_subtitle: 'اكسب المال من خلال توصيل الطلبات',



hero_subtitle:
'منصة متكاملة لتوصيل الطرود والوجبات والمستندات والتسوق مع تتبع مباشر وإشعارات فورية وتأكيد التسليم عبر رمز QR.',

services: 'خدماتنا',

services_subtitle:
'نوفر حلول توصيل سريعة وآمنة للأفراد والشركات داخل المدن.',

parcels: 'توصيل الطرود',

food: 'توصيل الوجبات',

documents: 'توصيل المستندات',

shopping: 'التسوق والتوصيل',

why_choose_us: 'لماذا تختارنا؟',

live_tracking: 'تتبع مباشر للمندوب',

instant_notifications: 'إشعارات فورية لحالة الطلب',

qr_security: 'تحقق آمن عبر QR Code',

transparent_prices: 'أسعار واضحة وشفافة',

multilingual: 'دعم العربية والفرنسية',

trusted_service: 'خدمة موثوقة وآمنة',

how_it_works: 'كيف يعمل التطبيق؟',

customer: 'العميل',

courier: 'المندوب',

step_customer_1: 'إنشاء طلب جديد',

step_customer_2: 'اختيار موقع الاستلام',

step_customer_3: 'اختيار موقع التسليم',

step_customer_4: 'متابعة المندوب مباشرة',

step_customer_5: 'تأكيد الاستلام عبر QR',

step_courier_1: 'استقبال الطلبات المتاحة',

step_courier_2: 'قبول الطلب',

step_courier_3: 'التوجه إلى موقع الاستلام',

step_courier_4: 'توصيل الطلب للوجهة',

step_courier_5: 'تأكيد التسليم عبر QR',

statistics: 'إحصائيات المنصة',

completed_orders: 'طلب تم توصيله',

active_couriers: 'مندوب نشط',

customers: 'عميل مسجل',

satisfaction: 'نسبة رضا العملاء',

supported_cities: 'المدن المدعومة',

security: 'الأمان',

contact_us: 'تواصل معنا',

login: 'تسجيل الدخول',
login_subtitle: 'قم بتسجيل الدخول للوصول إلى حسابك',
password: 'كلمة المرور',
remember_me: 'تذكرنى',
dont_have_account: 'ليس لديك حساب؟',
forgot_password: 'هل نسيت كلمة المرور؟',
create_account: 'إنشاء حساب',

register: 'إنشاء حساب',

register_as_customer: 'التسجيل كعميل',

register_as_courier: 'التسجيل كمندوب',

order_now: 'اطلب الآن',

become_courier: 'سجل كمندوب',
footer_title: 'علي للتوصيل السريع',

footer_text:
'منصة توصيل حديثة تربط العملاء بالمندوبين لتقديم خدمات توصيل سريعة وآمنة داخل النيجر.',

track_order: 'تتبع الطلب',

create_order: 'إنشاء طلب',


dashboard: 'لوحة التحكم',

notifications: 'الإشعارات',

logout: 'تسجيل الخروج',

profile: 'الملف الشخصي',
logged_in_as: 'تم تسجيل الدخول باسم {name}',
chose_type: 'اختر نوع المستخدم',
create_account_cus: 'تسجيل العميل',
create_account_subtitle: 'أنشئ حسابك لبدء الطلب',
create_account_con: 'تسجيل مندوب',
create_account_con_subtitle: 'انضم إلينا وابدأ في كسب المال',
mission_current: "🚀 المهمة الحالية",
scan_qr_instruction: "قم بمسح رموز QR للتحقق من الاستلام والتسليم.",
scan_pickup_qr: "مسح QR للاستلام",
scan_delivery_qr: "مسح QR للتسليم",
scan: 'مسح',
success: 'تمت العملية بنجاح',
InvalidQR: 'QR غير صالح',
  

pickup: "عنوان الاستلام",
dropoff: "عنوان التسليم",
status: "الحالة",

courier_arrived: "وصل المندوب",
picked_up: "تم الاستلام",
on_the_way: "في الطريق",
arrived_destination: "وصل إلى الوجهة",



  "available_orders": "📦 الطلبات المتاحة",
  "pickup": "عنوان الاستلام",
  "dropoff": "عنوان التسليم",
  "price": "السعر",
  "accept": "قبول الطلب",
  "order_accepted": "تم قبول الطلب 🚀",

  
  "courier_dashboard": "🚚 لوحة تحكم المندوب",
  "available_orders": "📦 الطلبات المتاحة",
  "current_mission": "🚀 المهمة الحالية",
  "profile": "👤 الملف الشخصي",

  "create_order": "🚚 إنشاء طلب",
  "choose_service": "اختر نوع الخدمة",
  "parcel": "طرد",
  "meal": "وجبة",
  "documents": "مستندات",
  "pickup_address": "عنوان الاستلام",
  "dropoff_address": "عنوان التسليم",
  "estimated_price": "السعر التقديري",
  "send_order": "إرسال الطلب",

  
  "welcome": "👋 أهلاً بك",
  "manage_orders_easily": "قم بإدارة طلباتك بسهولة",

  "create_order": "إنشاء طلب",
  "create_order_desc": "إرسال طلب توصيل جديد",


  "my_orders_desc": "عرض وتتبع طلباتك",

  "profile": "الملف الشخصي",
  "profile_desc": "إدارة معلوماتك الشخصية",

  "my_orders": " طلباتي",
  "loading": "جاري التحميل...",
  "no_orders_found": "لا توجد أي طلبات",
  "order_number": "📦 الطلب رقم",
  "status": "الحالة",
  "pickup_address": "عنوان الاستلام",
  "dropoff_address": "عنوان التسليم",
  "view_details": "عرض التفاصيل",

  "status_pending": "قيد الانتظار",
  "status_accepted": "تم القبول",
  "status_on_the_way": "في الطريق",
  "status_delivered": "تم التسليم",

  
  "tracking_loading": "جاري تحميل التتبع...",
  "order_tracking_title": "🚚 تتبع الطلب رقم",
  "pickup_qr": "رمز QR للاستلام",
  "delivery_qr": "رمز QR للتسليم",

  "status": "الحالة",
  "from": "من",
  "to": "إلى",

  "courier_position": "📍 موقع المندوب",
  "no_tracking_data": "لا توجد بيانات تتبع متاحة",

  "latitude": "📍 خط العرض",
  "longitude": "خط الطول",
  "time": "🕒 الوقت",

  "live_tracking": "📍 التتبع المباشر",





    },

    fr: {
  "name": "Nom",
  "phone": "Téléphone",
  "save_changes": "Enregistrer les modifications",
        create_order: 'Créer une commande',
        tracking: 'Suivi de commande',
        delivered: 'Livré',
            dashboard: 'Tableau de bord',
    orders: 'Commandes',
    users: 'Utilisateurs',
    user: 'Utilisateur',
    couriers: 'Livreurs',
    courier: 'Livreur',
    customers: 'Clients',
    customer: 'Client',


    logout: 'Déconnexion',
    login: 'Connexion',
    logout: 'Déconnexion',
    create_order: 'Créer une commande',

    admin_panel: 'Panneau d\'administration',
    tracking: 'Suivi de commande',
    delivered: 'Livré',
    rested: 'Livré',
    cancelled: 'Annulé',
    reset: 'Réinitialiser',
    cancel: 'Annuler',
    accept: 'Accepter',
    reject: 'Rejeter',
    pending: 'En attente',
    active: 'Actif',
    inactive: 'Inactif',
    status: 'Statut',
    order_status: 'Statut de la commande',
    user_status: 'Statut de l\'utilisateur',
    courier_status: 'Statut du livreur',
    order: 'Commande',
    price: 'Prix',
     weight: 'Poids',
     distance: 'Distance',
     action: 'Action',
     actions: 'Actions',
     arrived_destination: 'Arrivé à destination',
        on_the_way: 'En route',
        picked_up: 'Ramassé',   
        courier_arrived: 'Le livreur est arrivé pour le ramassage',
        dropoff: 'Adresse de livraison',
        pickup: 'Adresse de collecte',
app_name: 'Ali Livraison Express',

hero_title:
'Votre partenaire de confiance pour la livraison rapide au Niger',

hero_subtitle:
'Une plateforme complète pour la livraison de colis, repas, documents et courses avec suivi en temps réel, notifications instantanées et vérification par QR Code.',

services: 'Nos services',

services_subtitle:
'Des solutions de livraison rapides et sécurisées pour les particuliers et les entreprises.',

parcels: 'Livraison de colis',

food: 'Livraison de repas',

documents: 'Livraison de documents',

shopping: 'Courses et achats',

why_choose_us: 'Pourquoi nous choisir ?',

live_tracking: 'Suivi en temps réel',

instant_notifications: 'Notifications instantanées',

qr_security: 'Vérification sécurisée par QR Code',

transparent_prices: 'Tarification transparente',

multilingual: 'Support arabe et français',

trusted_service: 'Service fiable et sécurisé',

how_it_works: 'Comment ça marche ?',

customer: 'Client',

courier: 'Livreur',

step_customer_1: 'Créer une commande',

step_customer_2: 'Choisir le point de collecte',

step_customer_3: 'Choisir la destination',

step_customer_4: 'Suivre le livreur en direct',

step_customer_5: 'Confirmer la réception via QR',

step_courier_1: 'Recevoir les commandes disponibles',

step_courier_2: 'Accepter une commande',

step_courier_3: 'Se rendre au point de collecte',

step_courier_4: 'Livrer à destination',

step_courier_5: 'Confirmer la livraison via QR',

statistics: 'Statistiques',

completed_orders: 'Livraisons effectuées',

active_couriers: 'Livreurs actifs',

customers: 'Clients inscrits',

satisfaction: 'Taux de satisfaction',

supported_cities: 'Villes desservies',

security: 'Sécurité',

contact_us: 'Contactez-nous',

login: 'Connexion',
login_subtitle: 'Connectez-vous à votre compte',
password: 'Mot de passe',
remember_me: 'Se souvenir de moi',
dont_have_account: "Vous n'avez pas de compte ?",
forgot_password: 'Mot de passe oublié ?',
create_account: 'Créer un compte',

register: 'Inscription',

register_as_customer: 'Inscription Client',

register_as_courier: 'Inscription Livreur',

order_now: 'Commander maintenant',

become_courier: 'Devenir livreur',
footer_title: 'Ali Livraison Express',

footer_text:
'Une plateforme moderne reliant clients et livreurs pour des livraisons rapides et sécurisées au Niger.',

track_order: 'Suivre une commande',

create_order: 'Créer une commande',



dashboard: 'Tableau de bord',

notifications: 'Notifications',

logout: 'Déconnexion',

profile: 'Profil',
logged_in_as: 'Connecté en tant que {name}',
chose_type: 'Choisissez le type d\'utilisateur',
customer_subtitle: 'Commandez et suivez vos livraisons facilement',
courier_subtitle: 'Gagnez de l’argent en livrant des commandes',
create_account_cus: 'Inscription du client',
create_account_subtitle: 'Créez votre compte pour commencer à commander',
create_account_con: 'Inscription du livreur',
create_account_con_subtitle: 'Rejoignez‑nous et commencez à gagner de l’argent',

  mission_current: "🚀 Mission actuelle",
  scan_qr_instruction: "Scannez les QR codes pour vérifier le retrait et la livraison.",
  scan_pickup_qr: "Scanner le QR de retrait",
  scan_delivery_qr: "Scanner le QR de livraison",
  scan: 'Scanner',
  success: 'Succès',
  InvalidQR: 'QR invalide',


  pickup: "Adresse de retrait",
  dropoff: "Adresse de livraison",
  status: "Statut",

  courier_arrived: "Livreur arrivé",
  picked_up: "Colis récupéré",
  on_the_way: "En route",
  arrived_destination: "Arrivé à destination",

  "available_orders": "📦 Commandes disponibles",
  "pickup": "Adresse de retrait",
  "dropoff": "Adresse de livraison",
  "price": "Prix",
  "accept": "Accepter",
  "order_accepted": "Commande acceptée 🚀",

  
  "courier_dashboard": "🚚 Tableau de bord chauffeur",
  "available_orders": "📦 Commandes disponibles",
  "current_mission": "🚀 Mission actuelle",
  "profile": "👤 Profil",

  
  "create_order": "🚚 Créer une commande",
  "choose_service": "Choisir service",
  "parcel": "Colis",
  "meal": "Repas",
  "documents": "Documents",
  "pickup_address": "Adresse de ramassage",
  "dropoff_address": "Adresse de livraison",
  "estimated_price": "Prix estimé",
  "send_order": "Envoyer la commande",

  
  "welcome": "👋 Bienvenue",
  "manage_orders_easily": "Gérez vos commandes facilement",

  "create_order": "Créer une commande",
  "create_order_desc": "Envoyer une nouvelle demande de livraison",
  "my_orders_desc": "Voir et suivre vos commandes",

  "profile_desc": "Gérer vos informations personnelles",

  "my_orders": "📦 Mes commandes",
  "loading": "Chargement...",
  "no_orders_found": "Aucune commande trouvée",
  "order_number": "📦 Commande #",
  "status": "Statut",
  "pickup_address": "Adresse de ramassage",
  "dropoff_address": "Adresse de livraison",
  "view_details": "Voir détails",

  "status_pending": "En attente",
  "status_accepted": "Acceptée",
  "status_on_the_way": "En route",
  "status_delivered": "Livrée",


  "tracking_loading": "Chargement du suivi...",
  "order_tracking_title": "🚚 Suivi de commande #",
  "pickup_qr": "QR de ramassage",
  "delivery_qr": "QR de livraison",

  "status": "Statut",
  "from": "De",
  "to": "À",

  "courier_position": "📍 Position du livreur",
  "no_tracking_data": "Aucune donnée de suivi disponible",

  "latitude": "📍 Latitude",
  "longitude": "Longitude",
  "time": "🕒 Heure",

  "live_tracking": "📍 Tracking Live",



}
}

export default createI18n({
    legacy: false,
    locale: 'fr',
    fallbackLocale: 'fr',
    messages
})