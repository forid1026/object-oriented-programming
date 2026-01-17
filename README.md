# Object-Oriented Programming (OOP) – Full Concept in PHP

এই প্রোজেক্টে আমরা **Object-Oriented Programming (OOP)** এর মূল কনসেপ্টগুলোকে সহজ ভাষায়, প্র্যাক্টিকাল উদাহরণসহ বুঝবো।  
কোড উদাহরণগুলো PHP তে, তবে কনসেপ্ট সব OOP ভাষাতেই একই রকম।

---

## 📚 Table of Contents

1. [What is OOP?](#what-is-oop)
2. [Class & Object](#class--object)
3. [Four Pillars of OOP](#four-pillars-of-oop)
   - [Encapsulation](#1-encapsulation)
   - [Inheritance](#2-inheritance)
   - [Polymorphism](#3-polymorphism)
   - [Abstraction](#4-abstraction)
4. [Access Modifiers](#access-modifiers)
5. [Constructor & Destructor](#constructor--destructor)
6. [Interfaces](#interfaces)
7. [Traits (PHP Specific)](#traits-php-specific)
8. [Static Properties & Methods](#static-properties--methods)
9. [How to Run These Examples](#how-to-run-these-examples)

---

## What is OOP?

**OOP (Object-Oriented Programming)** হচ্ছে এমন এক programming style যেখানে আমরা আমাদের কোডকে **objects** আর **classes** দিয়ে organize করি।

- **Class** → Blue-print / ডিজাইন  
- **Object** → সেই design থেকে তৈরি real instance

👉 Benefits:

- Code Reusability  
- Easy to Maintain  
- Clean Structure  
- Real-life modeling (User, Product, Order ইত্যাদি)

---

## Class & Object

### 🔹 Class

Class হলো এক ধরনের template বা design যেখানে properties (data) আর methods (functions) ডিফাইন করা থাকে।

```php
class User {
    public $name;
    public $email;

    public function introduce() {
        echo "Hi, I am {$this->name} and my email is {$this->email}";
    }
}
