# Laravel Hashing SM3

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

为 Laravel 框架提供 SM3 国密哈希算法支持。

## 特性

- 🔐 支持 SM3 国密哈希算法
- 🚀 无缝集成 Laravel Hashing 系统
- ✅ 完全兼容 Laravel 5.6 - 12.x
- 📦 自动服务提供者注册
- 🧪 包含完整的单元测试

## 系统要求

- PHP >= 7.3
- Laravel >= 5.6

## 安装

使用 Composer 安装：

```bash
composer require wuwx/laravel-hashing-sm3
```

Laravel 5.5+ 会自动注册服务提供者，无需手动配置。

## 配置

### 方式一：设置为默认驱动

编辑 `config/hashing.php` 文件，将 `driver` 更改为 `sm3`：

```php
'driver' => 'sm3',
```

### 方式二：按需使用

保持默认驱动不变，在需要时指定使用 SM3：

```php
Hash::driver('sm3')->make($value);
```

## 使用示例

### 生成哈希值

```php
use Illuminate\Support\Facades\Hash;

// 使用默认驱动（需先配置为 sm3）
$hash = Hash::make('password');

// 或显式指定 sm3 驱动
$hash = Hash::driver('sm3')->make('password');
```

### 验证哈希值

```php
// 验证密码
if (Hash::check('password', $hash)) {
    // 密码正确
}

// 使用 sm3 驱动验证
if (Hash::driver('sm3')->check('password', $hash)) {
    // 密码正确
}
```

### 在用户认证中使用

配置为默认驱动后，Laravel 的用户认证系统会自动使用 SM3 算法：

```php
// 用户注册
$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => Hash::make('secret'), // 自动使用 SM3
]);

// 用户登录验证
if (Hash::check($request->password, $user->password)) {
    // 登录成功
}
```

## 测试

运行测试套件：

```bash
composer test
```

或使用 PHPUnit：

```bash
vendor/bin/phpunit
```

## 依赖

本包使用 [ch4o5/sm3-php](https://github.com/ch4o5/sm3-php) 作为底层 SM3 算法实现。

## 许可证

本项目采用 MIT 许可证。详见 [LICENSE](LICENSE) 文件。

## 贡献

欢迎提交 Issue 和 Pull Request！
