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
```

🔹 Object

Object হলো class এর একটি instance।
```php
$user = new User();
$user->name  = "Sheek Forid";
$user->email = "sheek@example.com";
$user->introduce();
```

## Four Pillars of OOP
1. Encapsulation

Encapsulation মানে হলো ডেটা এবং সেই ডেটার সাথে সম্পর্কিত ফাংশনকে একসাথে রাখা এবং ডেটাকে protection দেওয়া।

ডেটা কে outside থেকে direct access না দিয়ে

method এর মাধ্যমে control করা হয়

সাধারণত private + getter/setter ব্যবহার করা হয়

```php
class BankAccount {
    private $balance = 0;

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

$account = new BankAccount();
$account->deposit(1000);
$account->withdraw(300);
echo $account->getBalance(); // 700
```

### Key idea: balance সরাসরি বাইরে থেকে change করা যাচ্ছে না, সব কিছু method দিয়ে হচ্ছে।

2. Inheritance

Inheritance মানে একটি class আরেকটি class এর property ও method গুলো ইনহেরিট করে।

Code Reuse

Base (Parent) Class → Child (Derived) Class

```php

class Vehicle {
    public $brand;

    public function start() {
        echo "Vehicle is starting\n";
    }
}

class Car extends Vehicle {
    public function honk() {
        echo "Car is honking!\n";
    }
}

$car = new Car();
$car->brand = "Toyota";
$car->start(); // from parent
$car->honk();  // from child
```

3. Polymorphism

Polymorphism মানে "many forms" – একই method নাম different ভাবে behave করতে পারে, context অনুযায়ী।

সাধারণত দুই ভাবে আসে:

Method Overriding (parent vs child)

(কিছু language এ Method Overloading – কিন্তু PHP তে সত্যিকারের overloading নেই)

```php
class Shape {
    public function draw() {
        echo "Drawing a generic shape\n";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing a circle\n";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing a square\n";
    }
}

$shapes = [new Circle(), new Square()];

foreach ($shapes as $shape) {
    $shape->draw(); // একই method নাম, but আলাদা আলাদা output
}
```

4. Abstraction

Abstraction মানে হলো unnecessary details hide করে শুধু প্রয়োজনীয় অংশ expose করা।

abstract class এবং interface দিয়ে abstraction করা হয়

Abstract class এ abstract method থাকে, যার body থাকে না

Child class এ সেই method implement করতেই হবে
```php
abstract class PaymentGateway {
    abstract public function pay($amount);

    public function log($message) {
        echo "[LOG]: $message\n";
    }
}

class StripePayment extends PaymentGateway {
    public function pay($amount) {
        $this->log("Paying $amount using Stripe");
        echo "Paid $amount via Stripe\n";
    }
}

class PaypalPayment extends PaymentGateway {
    public function pay($amount) {
        $this->log("Paying $amount using PayPal");
        echo "Paid $amount via PayPal\n";
    }
}

$payment = new StripePayment();
$payment->pay(500);
```
Access Modifiers

Access Modifiers দিয়ে আমরা ঠিক করি কোন property/method কোথায় থেকে access করা যাবে।

public → class এর ভিতর ও বাইরে সব জায়গা থেকে access করা যায়

protected → শুধু class এবং এর child class থেকে access করা যায়

private → শুধুমাত্র সেই class এর ভিতর থেকে access করা যায়

```php

class Demo {
    public $publicVar = "Public";
    protected $protectedVar = "Protected";
    private $privateVar = "Private";

    public function showAll() {
        echo $this->publicVar . "\n";
        echo $this->protectedVar . "\n";
        echo $this->privateVar . "\n";
    }
}

class ChildDemo extends Demo {
    public function showFromChild() {
        echo $this->publicVar . "\n";
        echo $this->protectedVar . "\n";
        // $this->privateVar; // ❌ Error – private parent থেকে access হবে না
    }
}
```
Constructor & Destructor
🔹 Constructor

Object তৈরি হওয়ার সময় যেই method স্বয়ংক্রিয়ভাবে কল হয়, তাকে constructor বলে। PHP তে এর নাম __construct()।
```php

class User {
    public $name;

    public function __construct($name) {
        $this->name = $name;
        echo "User {$this->name} created!\n";
    }
}

$user = new User("Forid");
```

🔹 Destructor

Object destroy হওয়ার সময় call হয় __destruct()।

```php

class FileHandler {
    public function __construct() {
        echo "File opened\n";
    }

    public function __destruct() {
        echo "File closed\n";
    }
}

$fh = new FileHandler();
```
Interfaces

Interface হলো pure abstraction – এখানে শুধু method signature থাকে, কোনো implement থাকে না।

যে class interface implement করবে, তাকে interface এর সব method implement করতে হবে

এক class একাধিক interface implement করতে পারে (Multiple inheritance এর বিকল্প হিসেবে)

```php

interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        echo "Writing to file: $message\n";
    }
}

class DatabaseLogger implements Logger {
    public function log($message) {
        echo "Writing to database: $message\n";
    }
}

function process(Logger $logger) {
    $logger->log("Processing started");
}

process(new FileLogger());
process(new DatabaseLogger());
```
Traits (PHP Specific)

PHP তে multiple inheritance নেই, কিন্তু আমরা traits এর মাধ্যমে বিভিন্ন common method আলাদা করে রেখে বিভিন্ন class এ reuse করতে পারি।

```php

trait HasCreatedAt {
    public function setCreatedAt() {
        $this->created_at = date('Y-m-d H:i:s');
    }
}

trait HasUpdatedAt {
    public function setUpdatedAt() {
        $this->updated_at = date('Y-m-d H:i:s');
    }
}

class Post {
    use HasCreatedAt, HasUpdatedAt;

    public $created_at;
    public $updated_at;
}

$post = new Post();
$post->setCreatedAt();
$post->setUpdatedAt();

var_dump($post);
```

Static Properties & Methods

static keyword দিয়ে declare করা property/method কে class থেকে direct access করা যায় — object create না করেই।

```php

class MathHelper {
    public static $pi = 3.1416;

    public static function square($n) {
        return $n * $n;
    }
}

echo MathHelper::$pi . "\n";           // static property
echo MathHelper::square(5) . "\n";     // static method
```

## 🚀 How to Run

১. আপনার পিসিতে **PHP** ইনস্টল করা থাকতে হবে।  
২. যেকোনো একটি উদাহরণ কপি করে একটি `.php` ফাইলে রাখুন (যেমন: `oop.php`)।  
৩. আপনার টার্মিনাল বা কমান্ড প্রম্পট (CMD) ওপেন করুন এবং নিচের কমান্ডটি রান করুন:

```bash
php oop.php

---
**Created with ❤️ by [Sheek Forid](https://github.com/forid1026)**
