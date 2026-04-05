# Task 1: Slug Generator Implementation Details

هذا المستند يشرح الخطوات التقنية التي تم تنفيذها لإتمام المهمة الأولى.
This document outlines the technical steps taken to complete Task #1.

---

## 1. إدارة الفروع والبيئة (Git & Environment)
* **Branching:** تم العمل على برانش منفصل باسم `task-1-implement-slug-generator` لضمان مبدأ الـ Separation of Concerns.
* **Pull Request:** تم رفع الكود وفتح PR إلى برانش الـ `main` مع إبقائه مفتوحاً للمراجعة.

## 2. منطق العمل البرمجي (Core Implementation)
* **Custom Helper:** تم إنشاء ملف `app/Helpers/slug_helper.php` يحتوي على دالة `generate_custom_slug`.
* **Logic:** - تحويل النص إلى أحرف صغيرة (Lowercase).
    - استبدال المسافات بشرطات (`-`).
    - إزالة الرموز الخاصة باستخدام `preg_replace`.
* **Composer Autoload:** تم تسجيل ملف الهيلبر في `composer.json` لضمان عمله في كافة أجزاء التطبيق.

## 3. التوسيع الاحترافي (Str Macro)
* تم استخدام **Laravel Macros** في ملف `AppServiceProvider` لتوسيع مكتبة `Illuminate\Support\Str`.
* أصبح بإمكان المطورين استدعاء الدالة كجزء من مكتبة لارافل الأساسية عبر: `Str::slugCustom($title)`.

## 4. واجهة التيرمنال (Artisan Command)
* تم بناء أمر مخصص: `php artisan make:slug {title}`.
* **JSON Output:** يقوم الأمر بإرجاع النتيجة بصيغة JSON تحتوي على النص الأصلي والـ Slug المولد، مما يسهل التعامل مع المخرجات تقنياً.

## 5. اختبارات الوحدة (Unit Testing)
* تم إنشاء ملف `tests/Unit/SlugGeneratorTest.php`.
* يتضمن الاختبار حالات فحص لعناوين معقدة تحتوي على رموز ومسافات للتأكد من مطابقتها للمواصفات المطلوبة (SEO Friendly).

---

## كيف تجد الحل؟ (How to locate)
- **Helper Path:** `app/Helpers/slug_helper.php`
- **Command Path:** `app/Console/Commands/GenerateSlug.php`
- **Test Path:** `tests/Unit/SlugGeneratorTest.php`
- **Service Provider:** `app/Providers/AppServiceProvider.php`
