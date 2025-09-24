# 🏭 Factory Method Design Pattern

> **The Flexible Object Creator** • Defer Instantiation to Subclasses

![Design Pattern](https://img.shields.io/badge/Pattern-Creational-FF6B6B?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-8.4%2B-777BB4?style=for-the-badge)
![SOLID](https://img.shields.io/badge/SOLID-Compliant-blue?style=for-the-badge)
![PSR-12](https://img.shields.io/badge/PSR--12-Compliant-brightgreen?style=for-the-badge)

## 🌟 Overview

| **Aspect** | **Description** |
|------------|-----------------|
| **Pattern Type** | Creational |
| **Purpose** | Delegate object creation to subclasses/factory methods, providing flexibility in object instantiation |
| **Complexity** | ⭐⭐☆☆☆ |
| **Popularity** | ⭐⭐⭐⭐⭐ |

## 📖 Definition

> **"The Subclass Director of Object Creation"** 🎬
> 
> The **Factory Method** pattern defines an interface (or abstract method) for creating an object in a superclass, but allows subclasses to decide which specific class to instantiate.

## 🎯 Overall Concept

### 🧠 Core Philosophy
The Factory Method pattern embodies the principle of **deferred creation** - allowing subclasses to control the instantiation process while maintaining a consistent interface for clients.

### ⚡ How It Works
- **Abstract Creation**: Creator class declares abstract factory method
- **Subclass Control**: Concrete subclasses implement the factory method
- **Polymorphic Creation**: Same method call creates different objects
- **Loose Coupling**: Clients depend on abstractions, not concrete classes

### 🎨 Visual Metaphor
> Think of it as a **global logistics company** - the headquarters (Creator) defines the delivery process (factory method), but each regional office (ConcreteCreator) chooses the appropriate transportation method (Truck, Ship, Plane) based on local infrastructure and requirements!

## ✨ Benefits & Advantages

### 🚀 Flexibility & Extensibility
- 🎯 **Easy Extension**: Add new product types without modifying existing code
- ⚡ **Runtime Flexibility**: Choose which product to create at runtime
- 📦 **Multiple Variations**: Support multiple product families easily
- 🔄 **Open/Closed**: Open for extension, closed for modification

### 🔧 Maintainability & Testability
- 🛡️ **Loose Coupling**: Clients depend on interfaces, not implementations
- 🔒 **Testability**: Easy to mock products for testing
- 📋 **Single Responsibility**: Each class has one reason to change
- 🌐 **Clean Architecture**: Separation of creation and business logic

### 🎯 Practical Advantages
- 🌐 **Framework Development**: Perfect for libraries and frameworks
- 🏗️ **Plugin Systems**: Allow third-party extensions
- 🔄 **Cross-Platform**: Different implementations for different platforms
- 🎨 **Theming Systems**: Different looks for same functionality

## 🎯 Problems Solved

### 🚫 Tight Coupling
- **Direct Instantiation**: Eliminates `new` keywords in client code
- **Concrete Dependencies**: Clients depend on abstractions, not concretions
- **Hardcoded Types**: Removes hardcoded class names from client code

### 🌐 Framework Development
- **Extension Points**: Provides hooks for subclasses to customize behavior
- **Plugin Architecture**: Enables third-party extensions
- **Template Methods**: Works perfectly with template method pattern

### ⚡ Object Creation Complexity
- **Complex Initialization**: Handles objects requiring complex setup
- **Multiple Variations**: Manages families of related objects
- **Configuration-Driven**: Creation based on configuration or context

## 📊 When to Use Factory Method

### ✅ Ideal Use Cases
| **Scenario** | **Why Factory Method?** |
|--------------|-------------------|
| **Frameworks** | When building extensible frameworks |
| **Plugin Systems** | When allowing third-party extensions |
| **Cross-Platform** | Different implementations for different platforms |
| **Testing** | When needing to mock dependencies |
| **Complex Creation** | When object creation is complex or conditional |

### 🎯 Decision Checklist
- ✔️ Do you need to defer instantiation to subclasses?
- ✔️ Do you want clients to depend on interfaces rather than concrete classes?
- ✔️ Do you anticipate needing multiple variations of a product?
- ✔️ Are you building a framework or library for others to extend?
- ✔️ Do you need to support runtime selection of product types?

## ⚠️ When to Avoid

### 🚫 Anti-Pattern Scenarios
- ❌ **Simple Objects**: For objects with simple construction (use direct instantiation)
- ❌ **Performance Critical**: When factory overhead is unacceptable
- ❌ **Over-Engineering**: Don't use if you only have one product variant
- ❌ **Static Creation**: When creation logic doesn't need variation

### 🔄 Better Alternatives
- **Builder** - For complex object construction with many steps
- **Abstract Factory** - For creating families of related objects
- **Dependency Injection** - For external dependency management

## 🆚 Pattern Comparison

Got it 👍 Here’s the **Factory Method vs. Dependency Injection** difference table in the same style you showed:

---

### 🏭 Factory Method vs. Dependency Injection

| **Aspect**              | **Factory Method**                                                | **Dependency Injection (DI)**                                     |
| ----------------------- | ----------------------------------------------------------------- | ----------------------------------------------------------------- |
| **Category**            | Creational **design pattern**                                     | Architectural **principle/technique**                             |
| **Purpose**             | Encapsulates object creation logic                                | Provides dependencies from outside                                |
| **Complexity**          | Moderate — requires extra factory classes/methods            | Low–High — can be simple (manual DI) or complex (using a DI container/framework) |
| **Control of Creation** | Factory decides which class/object to instantiate                 | Caller/container provides the ready-made dependency               |
| **Coupling**            | Reduces coupling between client and concrete classes              | Decouples classes from creating/locating dependencies             |
| **Use Case**               | Use when object creation logic is complex or needs centralization | Use when you want flexible, testable, and loosely coupled classes |        |

### 🏭 Factory Method vs. Abstract Factory
| **Aspect** | **Factory Method** | **Abstract Factory** |
|------------|---------------|-------------|
| **Category** | Creational **design pattern** | Creational **design pattern** |
| **Purpose** | Single product creation | Product families |
| **Methods** | One factory method | Multiple factory methods |
| **Complexity** | Simpler | More complex |
| **Scope** | Single product | Multiple related products |
| **Use Case** | Deferred instantiation | Cross-platform UI |

## 🏁 Conclusion

The **Factory Method Pattern** is like a **flexible manufacturing blueprint** - it provides the structure for object creation while allowing subclasses to customize the implementation details.

### 🎯 Perfect For:
- Framework and library development
- Plugin and extension systems
- Cross-platform applications
- Testing and mock object creation
- Situations requiring runtime flexibility

### 🔧 Remember:
> **"Delegate to specialize"** - use the Factory Method pattern when you need to defer object creation to subclasses, but avoid over-engineering simple scenarios.

---

<div align="center">

**⭐ If this documentation helped you, please give it a star!**

*"Master patterns, master code."* 🚀

</div>