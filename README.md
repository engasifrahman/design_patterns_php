# 🎯 PHP Design Patterns Repository

> **Master the Art of Software Architecture** implementations in PHP 8.4

![PHP Version](https://img.shields.io/badge/PHP-8.4%2B-777BB4?style=for-the-badge&logo=php)
![Patterns](https://img.shields.io/badge/Patterns-30%2B-blue?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-lightgrey?style=for-the-badge)
![PSR-12](https://img.shields.io/badge/PSR--12-Compliant-brightgreen?style=for-the-badge)

## 📚 Overview

A comprehensive collection of design patterns implemented in modern PHP 8.4. This repository serves as a learning resource for implementing proven software design solutions.

## 🏗️ Pattern Categories

### 🎨 Creational Patterns
*Involved in the process of object creation*

- **✅ Singleton** - Ensure a class has only one instance
- **✅ Factory Method** - Create objects without specifying exact class
- **✅ Abstract Factory** - Create families of related objects
- **🔜 Builder** - Construct complex objects step by step
- **🔜 Prototype** - Create new objects by copying existing ones

### 🏛️ Structural Patterns
*Concerned with the composition of classes and objects*

- **🔜 Adapter** - Allows incompatible interfaces to work together
- **🔜 Bridge** - Separate abstraction from implementation
- **🔜 Composite** - Treat individual objects and compositions uniformly
- **🔜 Decorator** - Add responsibilities to objects dynamically
- **🔜 Facade** - Provide a simplified interface to a complex system

### 🎭 Behavioral Patterns
*Concerned with interaction between objects*

- **🔜 Observer** - Define dependency between objects
- **🔜 Strategy** - Define a family of algorithms
- **🔜 Command** - Encapsulate a request as an object
- **🔜 Iterator** - Access elements of a collection sequentially
- **🔜 State** - Allow object to alter behavior when state changes

### Directory Structure
```
 ┣ 📂demo
 ┣ 📂src
 ┃ ┣ 📂Behavioral
 ┃ ┣ 📂Creational
 ┃ ┗ 📂Structural
```

## ✨ Features

### 🎯 Modern PHP 8.4
- **Typed Properties** - Full type safety
- **Union Types** - Flexible parameter handling
- **Match Expressions** - Clean control structures
- **Constructor Property Promotion** - Concise class definitions
- **Readonly Properties** - Immutable data structures
- **PSR-12 Compliance** - Industry standard coding style
- **Documentation** - Detailed explanations and examples

### 📚 Learning Focused
- **Clean Examples** - Easy-to-understand implementations
- **Real-world Use Cases** - Practical application scenarios
- **Comparison Guides** - Pattern differences explained
- **Best Practices** - Professional implementation tips
- **Anti-pattern Warnings** - Common mistakes to avoid

## 🎓 Learning Path

### Beginner → Advanced
1. **Start with Creational Patterns** (Singleton, Factory)
2. **Move to Structural Patterns** (Adapter, Decorator)
3. **Explore Behavioral Patterns** (Observer, Strategy)
4. **Study Pattern Combinations** (how patterns work together)
5. **Understand Trade-offs** (when to use which pattern)

### Recommended Study Order
1. Singleton → Factory Method → Abstract Factory
2. Adapter → Decorator → Facade
3. Observer → Strategy → Command
4. Composite → Iterator → State


Here's the complete Pattern Comparison Guide in markdown format:

## 📊 Design Pattern Comparison Guide

### Creational Patterns

| Pattern | Type | Complexity | Use Case | Key Feature | When to Use |
|---------|------|------------|----------|-------------|-------------|
| **Singleton** | Creational | ⭐☆☆☆☆ | Global access point | Single instance | When exactly one instance is needed |
| **Factory Method** | Creational | ⭐⭐☆☆☆ | Object creation | Subclass decides | When class doesn't know exact object type |
| **Abstract Factory** | Creational | ⭐⭐⭐☆☆ | Families of objects | Product families | When system needs multiple product families |
| **Builder** | Creational | ⭐⭐☆☆☆ | Complex objects | Step-by-step construction | When object has many optional parameters |
| **Prototype** | Creational | ⭐⭐☆☆☆ | Object cloning | Copy existing instances | When object creation is expensive |

### Structural Patterns

| Pattern | Type | Complexity | Use Case | Key Feature | When to Use |
|---------|------|------------|----------|-------------|-------------|
| **Adapter** | Structural | ⭐⭐☆☆☆ | Interface compatibility | Wrapper for compatibility | When integrating incompatible interfaces |
| **Bridge** | Structural | ⭐⭐⭐☆☆ | Abstraction separation | Decouple abstraction from implementation | When abstraction and implementation vary independently |
| **Composite** | Structural | ⭐⭐☆☆☆ | Tree structures | Part-whole hierarchies | When clients treat individual objects and compositions uniformly |
| **Decorator** | Structural | ⭐⭐☆☆☆ | Dynamic responsibilities | Add functionality dynamically | When need to add responsibilities to objects without subclassing |
| **Facade** | Structural | ⭐☆☆☆☆ | Simplified interface | Unified interface to subsystem | When need simple interface to complex subsystem |
| **Flyweight** | Structural | ⭐⭐⭐☆☆ | Memory efficiency | Share objects to reduce memory | When large numbers of similar objects needed |
| **Proxy** | Structural | ⭐⭐☆☆☆ | Object access control | Surrogate or placeholder | When need to control access to an object |

### Behavioral Patterns

| Pattern | Type | Complexity | Use Case | Key Feature | When to Use |
|---------|------|------------|----------|-------------|-------------|
| **Observer** | Behavioral | ⭐⭐⭐☆☆ | Event handling | Publish-subscribe mechanism | When objects need to be notified of changes |
| **Strategy** | Behavioral | ⭐⭐☆☆☆ | Algorithm selection | Interchangeable algorithms | When need to select algorithm at runtime |
| **Command** | Behavioral | ⭐⭐☆☆☆ | Action encapsulation | Encapsulate requests as objects | When need to parameterize objects with operations |
| **Iterator** | Behavioral | ⭐⭐☆☆☆ | Collection traversal | Sequential access to elements | When need to access collection elements without exposing structure |
| **State** | Behavioral | ⭐⭐⭐☆☆ | State-dependent behavior | Object behavior changes with state | When object behavior depends on its state |
| **Template Method** | Behavioral | ⭐⭐☆☆☆ | Algorithm skeleton | Define algorithm skeleton | When common algorithm structure with varying steps |
| **Visitor** | Behavioral | ⭐⭐⭐⭐☆ | Operations on objects | Separate operations from objects | When need to add operations without changing classes |
| **Chain of Responsibility** | Behavioral | ⭐⭐⭐☆☆ | Request handling | Pass request along chain | When multiple objects may handle a request |
| **Mediator** | Behavioral | ⭐⭐⭐☆☆ | Object communication | Centralized communication | When objects communicate in complex ways |
| **Memento** | Behavioral | ⭐⭐☆☆☆ | State saving | Capture and restore state | When need to save and restore object state |


## 📖 Documentation

Each pattern includes comprehensive documentation:

- **Definition** - Clear pattern explanation
- **Benefits** - Advantages and use cases
- **Implementation** - Code structure and examples
- **When to Use** - Appropriate scenarios
- **When to Avoid** - Anti-pattern warnings
- **Comparisons** - Differences with similar patterns

## 🌟 Why This Repository?

### ✅ Professional Grade
- Production-ready code
- PSR-12 compliant
- Well documented

### ✅ Learning Optimized
- Clean, readable code
- Practical examples
- Progressive complexity
- Real-world scenarios

### ✅ Modern PHP
- PHP 8.4 features
- Modern syntax
- Type safety
- Performance optimized

## 🤝 Contributing

We welcome contributions! Please see our contributing guidelines:

1. **Fork** the repository
2. **Create** a feature branch
3. **Implement** patterns with tests
4. **Follow** PSR-12 standards
5. **Submit** a pull request

### Contribution Areas
- New pattern implementations
- Additional examples
- Improved documentation
- Performance optimizations
- Test coverage expansion

## 🏆 Best Practices

### Code Quality
- **Type Safety** - Strict typing throughout
- **Error Handling** - Comprehensive exception management
- **Documentation** - PHPDoc for all methods
- **Testing** - Full test coverage

### Design Principles
- **SOLID Principles** - Applied where appropriate
- **DRY Code** - No unnecessary duplication
- **KISS** - Keep implementations simple
- **YAGNI** - Only implement what's needed

## 📚 Resources

### Recommended Reading
- **Design Patterns: Elements of Reusable Object-Oriented Software** (Gang of Four)
- **Head First Design Patterns**
- **Refactoring Guru** - Online pattern references

### Useful Links
- [PHP FIG Standards](https://www.php-fig.org/)
- [PHP Manual](https://www.php.net/manual/)
- [Design Patterns Reference](https://refactoring.guru/design-patterns)

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- **Gang of Four** - For the original design patterns book
- **PHP Community** - For ongoing improvements and standards
- **Contributors** - Everyone who helps improve this repository

---

<div align="center">

**⭐ If this documentation helped you, please give it a star!**

*"Master patterns, master code."* 🚀

</div>
