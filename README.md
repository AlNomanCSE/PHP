# Learn PHP - Comprehensive Programming Guide

Welcome to the Learn PHP repository! This resource is designed for developers who want to master PHP for modern web development. PHP 8.3 the latest stable version was released in November 2023. It has taken a big stride by incorporating powerful features and enhancements that make it still relevant and competitive in modern web development. This guide covers PHP Data Types, Superglobals, Arrays, Objects, Functions, and advanced features to help you build robust web applications, APIs, and enterprise solutions.

## 📚 Overview

This repository covers essential PHP concepts for modern web development:

- **PHP Data Types**: Understand scalar, compound, and special types for efficient data handling
- **Superglobals**: Master PHP's built-in global variables for web development
- **Arrays**: Learn indexed, associative, and multidimensional arrays
- **Objects & Classes**: Object-oriented programming concepts and design patterns
- **Functions**: Built-in functions, user-defined functions, and closures
- **Modern PHP Features**: Latest PHP 8.x features and best practices

## 🎯 Goals

- Build a strong foundation in PHP for web development
- Master object-oriented programming in PHP
- Learn modern PHP features and best practices
- Create scalable web applications and APIs
- Understand PHP's ecosystem and frameworks

## 🗂️ Topics

### 1. PHP Data Types

PHP supports various data types that are essential for web development and data manipulation.

#### 1.1. Data Type Categories

**Scalar Types:**
- `int` (Integer): Whole numbers
- `float` (Float/Double): Decimal numbers
- `string` (String): Text data
- `bool` (Boolean): True/false values

**Compound Types:**
- `array`: Collections of data
- `object`: Instances of classes
- `callable`: Functions and methods
- `iterable`: Arrays and objects implementing Traversable

**Special Types:**
- `resource`: External resources (files, database connections)
- `null`: Represents no value

#### 1.2. Comparison Table

| Type | Description | Example | Memory Usage | Common Use Cases |
|------|-------------|---------|--------------|------------------|
| **int** | Whole numbers | `42`, `-15` | 4-8 bytes | Counters, IDs, calculations |
| **float** | Decimal numbers | `3.14`, `2.5e3` | 8 bytes | Prices, measurements, math |
| **string** | Text data | `"Hello World"` | Variable | Names, messages, HTML |
| **bool** | True/false | `true`, `false` | 1 byte | Flags, conditions, validation |
| **array** | Collections | `[1, 2, 3]` | Variable | Lists, maps, configurations |
| **object** | Class instances | `new User()` | Variable | Models, services, components |
| **null** | No value | `null` | Minimal | Default values, empty states |

#### 1.3. Code Examples

**Example 1: Scalar Types**
```php
<?php
// Integer
$age = 25;
$userCount = 1000;

// Float
$price = 19.99;
$temperature = -5.5;

// String
$name = "John Doe";
$message = 'Welcome to PHP!';

// Boolean
$isActive = true;
$isComplete = false;

echo "User: $name, Age: $age, Price: $price, Active: " . ($isActive ? 'Yes' : 'No');
?>
```

**Example 2: Type Checking and Conversion**
```php
<?php
$value = "123";

// Type checking
var_dump(is_string($value)); // bool(true)
var_dump(is_int($value));    // bool(false)

// Type conversion
$intValue = (int)$value;     // 123
$floatValue = (float)$value; // 123.0
$boolValue = (bool)$value;   // true

// Strict type checking (PHP 7+)
function addNumbers(int $a, int $b): int {
    return $a + $b;
}

echo addNumbers(5, 10); // 15
?>
```

### 2. PHP Superglobals

Superglobals are built-in variables that are always accessible from any scope without using the `global` keyword.

#### 2.1. Superglobal Variables

- `$GLOBALS`: References all variables in global scope
- `$_SERVER`: Server and environment information
- `$_GET`: HTTP GET data
- `$_POST`: HTTP POST data
- `$_FILES`: File upload information
- `$_COOKIE`: Cookie values
- `$_SESSION`: Session variables
- `$_REQUEST`: Combined GET, POST, and COOKIE data
- `$_ENV`: Environment variables

#### 2.2. Examples

**Example 1: $_SERVER Superglobal**
```php
<?php
// Server information
echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "Current Script: " . $_SERVER['PHP_SELF'] . "<br>";

// Request URI
$currentUrl = $_SERVER['REQUEST_URI'];
echo "Current URL: $currentUrl";
?>
```

**Example 2: Form Handling with $_POST**
```php
<?php
// HTML Form (separate file: form.html)
/*
<form method="POST" action="process.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Submit</button>
</form>
*/

// PHP Processing (process.php)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    
    if ($username && $email) {
        echo "Welcome, $username! Your email: $email";
    } else {
        echo "Invalid input data.";
    }
}
?>
```

**Example 3: Session Management**
```php
<?php
session_start();

// Set session variables
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'john_doe';
$_SESSION['role'] = 'admin';

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Get current user
function getCurrentUser() {
    return [
        'id' => $_SESSION['user_id'] ?? null,
        'username' => $_SESSION['username'] ?? null,
        'role' => $_SESSION['role'] ?? 'guest'
    ];
}

if (isLoggedIn()) {
    $user = getCurrentUser();
    echo "Hello, {$user['username']}! Role: {$user['role']}";
} else {
    echo "Please log in.";
}
?>
```

### 3. PHP Arrays

Arrays are one of the most important data structures in PHP, used for storing multiple values.

#### 3.1. Array Types

**Indexed Arrays:**
```php
<?php
$fruits = ["apple", "banana", "orange"];
$numbers = [1, 2, 3, 4, 5];

// Access elements
echo $fruits[0]; // apple
echo $numbers[2]; // 3
?>
```

**Associative Arrays:**
```php
<?php
$user = [
    "name" => "John Doe",
    "email" => "john@example.com",
    "age" => 30,
    "city" => "New York"
];

// Access elements
echo $user["name"]; // John Doe
echo $user["age"];  // 30
?>
```

**Multidimensional Arrays:**
```php
<?php
$users = [
    [
        "id" => 1,
        "name" => "John Doe",
        "email" => "john@example.com"
    ],
    [
        "id" => 2,
        "name" => "Jane Smith",
        "email" => "jane@example.com"
    ]
];

// Access nested elements
echo $users[0]["name"]; // John Doe
echo $users[1]["email"]; // jane@example.com
?>
```

#### 3.2. Array Functions

**Common Array Operations:**
```php
<?php
$numbers = [1, 2, 3, 4, 5];

// Add elements
array_push($numbers, 6, 7);    // [1, 2, 3, 4, 5, 6, 7]
$numbers[] = 8;                // [1, 2, 3, 4, 5, 6, 7, 8]

// Remove elements
$last = array_pop($numbers);   // Removes 8, returns 8
$first = array_shift($numbers); // Removes 1, returns 1

// Array information
echo count($numbers);          // Length of array
echo in_array(3, $numbers);    // Check if value exists

// Array manipulation
$doubled = array_map(function($n) { return $n * 2; }, $numbers);
$filtered = array_filter($numbers, function($n) { return $n > 3; });
$sum = array_reduce($numbers, function($carry, $item) { return $carry + $item; }, 0);

print_r($doubled);  // [2, 4, 6, 8, 10, 12, 14]
print_r($filtered); // [4, 5, 6, 7]
echo $sum;          // Sum of all numbers
?>
```

### 4. Objects and Classes

PHP supports object-oriented programming with classes, objects, inheritance, and modern features.

#### 4.1. Basic Class Structure

```php
<?php
class User {
    // Properties
    private $id;
    private $name;
    private $email;
    protected $createdAt;
    public $isActive;

    // Constructor
    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
        $this->createdAt = new DateTime();
        $this->isActive = true;
    }

    // Getter methods
    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    // Setter methods
    public function setName(string $name): void {
        $this->name = $name;
    }

    // Public methods
    public function getFullInfo(): array {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'created' => $this->createdAt->format('Y-m-d H:i:s'),
            'active' => $this->isActive
        ];
    }
}

// Usage
$user = new User("John Doe", "john@example.com");
echo $user->getName(); // John Doe
print_r($user->getFullInfo());
?>
```

#### 4.2. Inheritance and Polymorphism

```php
<?php
// Base class
abstract class Animal {
    protected $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    abstract public function makeSound(): string;
    
    public function getName(): string {
        return $this->name;
    }
}

// Derived classes
class Dog extends Animal {
    public function makeSound(): string {
        return "Woof!";
    }
}

class Cat extends Animal {
    public function makeSound(): string {
        return "Meow!";
    }
}

// Interface
interface Flyable {
    public function fly(): string;
}

class Bird extends Animal implements Flyable {
    public function makeSound(): string {
        return "Tweet!";
    }
    
    public function fly(): string {
        return "{$this->name} is flying!";
    }
}

// Usage
$animals = [
    new Dog("Buddy"),
    new Cat("Whiskers"),
    new Bird("Tweety")
];

foreach ($animals as $animal) {
    echo $animal->getName() . " says: " . $animal->makeSound() . "<br>";
    
    if ($animal instanceof Flyable) {
        echo $animal->fly() . "<br>";
    }
}
?>
```

### 5. Functions

PHP offers various types of functions for code organization and reusability.

#### 5.1. Function Types

**User-Defined Functions:**
```php
<?php
// Basic function
function greet($name) {
    return "Hello, $name!";
}

// Function with default parameters
function createUser($name, $email, $role = 'user') {
    return [
        'name' => $name,
        'email' => $email,
        'role' => $role,
        'created_at' => date('Y-m-d H:i:s')
    ];
}

// Function with type declarations (PHP 7+)
function calculateTotal(float $price, float $tax = 0.08): float {
    return $price * (1 + $tax);
}

// Variadic functions
function sum(...$numbers): int {
    return array_sum($numbers);
}

echo greet("John");                    // Hello, John!
$user = createUser("Jane", "jane@example.com");
echo calculateTotal(100.00, 0.10);     // 110.0
echo sum(1, 2, 3, 4, 5);              // 15
?>
```

**Anonymous Functions (Closures):**
```php
<?php
// Basic closure
$multiply = function($a, $b) {
    return $a * $b;
};

echo $multiply(5, 3); // 15

// Closure with use statement
$factor = 10;
$multiplyByFactor = function($number) use ($factor) {
    return $number * $factor;
};

echo $multiplyByFactor(5); // 50

// Arrow functions (PHP 7.4+)
$square = fn($x) => $x * $x;
echo $square(4); // 16

// Using closures with array functions
$numbers = [1, 2, 3, 4, 5];
$squared = array_map(fn($n) => $n * $n, $numbers);
$evens = array_filter($numbers, fn($n) => $n % 2 === 0);

print_r($squared); // [1, 4, 9, 16, 25]
print_r($evens);   // [2, 4]
?>
```

### 6. Modern PHP Features

#### 6.1. PHP 8.x Features

**Match Expression (PHP 8.0):**
```php
<?php
function getStatusMessage($status) {
    return match($status) {
        'pending' => 'Your order is pending',
        'processing' => 'Your order is being processed',
        'shipped' => 'Your order has been shipped',
        'delivered' => 'Your order has been delivered',
        default => 'Unknown status'
    };
}

echo getStatusMessage('shipped'); // Your order has been shipped
?>
```

**Named Arguments (PHP 8.0):**
```php
<?php
function createProduct($name, $price, $category = 'general', $inStock = true) {
    return [
        'name' => $name,
        'price' => $price,
        'category' => $category,
        'in_stock' => $inStock
    ];
}

// Named arguments allow any order
$product = createProduct(
    price: 29.99,
    name: 'Widget',
    inStock: false
);

print_r($product);
?>
```

**Constructor Property Promotion (PHP 8.0):**
```php
<?php
class Product {
    public function __construct(
        public string $name,
        public float $price,
        public string $category = 'general',
        private bool $inStock = true
    ) {}
    
    public function isInStock(): bool {
        return $this->inStock;
    }
    
    public function getInfo(): array {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'category' => $this->category,
            'in_stock' => $this->inStock
        ];
    }
}

$product = new Product('Laptop', 999.99, 'Electronics');
print_r($product->getInfo());
?>
```

**Enums (PHP 8.1):**
```php
<?php
enum Status: string {
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    
    public function getColor(): string {
        return match($this) {
            Status::PENDING => 'yellow',
            Status::APPROVED => 'green',
            Status::REJECTED => 'red',
        };
    }
}

class Order {
    public function __construct(
        public int $id,
        public Status $status
    ) {}
}

$order = new Order(123, Status::PENDING);
echo $order->status->value;        // pending
echo $order->status->getColor();   // yellow
?>
```

## 🚀 Practical Applications

### Web Development
- **Frontend**: Generate dynamic HTML, handle forms, manage sessions
- **Backend**: Create APIs, process data, integrate with databases
- **Frameworks**: Laravel, Symfony, CodeIgniter for rapid development

### Database Integration
```php
<?php
// PDO Example
try {
    $pdo = new PDO('mysql:host=localhost;dbname=myapp', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepared statements
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
```

### API Development
```php
<?php
header('Content-Type: application/json');

// Simple REST API endpoint
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

switch ($method) {
    case 'GET':
        $users = [
            ['id' => 1, 'name' => 'John'],
            ['id' => 2, 'name' => 'Jane']
        ];
        echo json_encode($users);
        break;
        
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        // Process the input
        echo json_encode(['status' => 'created', 'data' => $input]);
        break;
        
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
}
?>
```

## 📖 Learning Resources

### Documentation
- **Official PHP Manual**: [php.net](https://www.php.net/manual/)
- **PHP The Right Way**: Best practices guide
- **PSR Standards**: PHP-FIG coding standards

### Books
- **"Modern PHP" by Josh Lockhart** (~$35)
- **"PHP Objects, Patterns, and Practice" by Mika Schwartz** (~$45)
- **"Clean Code in PHP" by Carsten Windler** (~$30)

### Online Courses
- **PHP for Beginners** - Laracasts (Free/Premium)
- **Object-Oriented PHP** - Codecademy (~$39/month)
- **Advanced PHP** - Udemy (~$20 during sales)

### Frameworks & Tools
- **Laravel**: Full-stack PHP framework
- **Symfony**: Component-based framework
- **Composer**: Dependency management
- **PHPUnit**: Testing framework

## 🛠️ Getting Started

1. **Install PHP:**
   ```bash
   # Windows (using Chocolatey)
   choco install php
   
   # macOS (using Homebrew)
   brew install php
   
   # Ubuntu/Debian
   sudo apt install php php-cli
   ```

2. **Set Up Development Environment:**
   - Install a local server (XAMPP, WAMP, or MAMP)
   - Use VS Code with PHP extensions
   - Install Composer for package management

3. **Create Your First PHP Script:**
   ```php
   <?php
   echo "Hello, PHP World!";
   ?>
   ```

4. **Practice Core Concepts:**
   - Work with variables and data types
   - Create functions and classes
   - Handle forms and sessions
   - Connect to databases

5. **Build Projects:**
   - Contact form with email sending
   - User registration/login system
   - Simple blog or CMS
   - REST API with database integration

## 🤝 Contributing

Contributions are welcome! Add examples, fix bugs, or suggest improvements:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-example`)
3. Commit your changes (`git commit -m "Add new PHP example"`)
4. Push to the branch (`git push origin feature/new-example`)
5. Open a pull request

## 📜 License

This project is licensed under the MIT License.

## 🌟 Acknowledgments

- Thanks to the PHP community for continuous development
- While 86% of PHP developers are using version 8 in 2024, adoption remains lower compared to the 96% who had adopted version 7
- Special thanks to framework maintainers and educators