# Learn Laravel 2024

## 2024-09

### Learnku 话题备份

增加了一个 Artisan 命令，用于导入 learnku.com 用户的话题列表。 写了一个简单的爬虫，

- 首先抓取获取话题列表
- 然后再访问编辑页面获取 Markdown 内容

注意访问编辑页面需要授权，所以需要提供本人的 `laravel_session` cookie。

```
➜  learn-laravel-2024 git:(main) ✗ artisan app:import-learnku-topics

 请输入你的 learnku.com 话题列表 URL [https://learnku.com/users/72619/topics]:
 >

正在导入话题列表：https://learnku.com/users/72619/topics
话题列表导入完毕，共 30 个话题

 请输入你的 learnku.com laravel_session [形如 eyJp...%3D]:
 > eyJp...%3D

 30/30 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%
```


### 分页定制
默认分页是用 Tailwind 的，如果我们不用 Tailwind，可以用默认的 `pagination::default` 模版，这个比较简单，方便定制样式。

```
{{ $champions->links('pagination::default') }}
```

```css
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination li > * {
    display: block;
    line-height: 1.5;
    padding: 5px 10px;
    border: 1px solid #ccc;
    text-decoration: none;
    color: #333;
}

.pagination li.active > * {
    background-color: #333;
    color: #fff;
}

.pagination a:hover {
    background-color: #f4f4f4;
}

.pagination .disabled {
    color: #ccc;
    pointer-events: none;
}
```


### 调查 Filament 技术栈

- 用 PHP 定义前端表单字段，类似 Nova，这是一个特色，不用写前端代码
- 有 Resource 的概念，来处理 CRUD 操作，同样类似 Nova
- 前端资源是打包好的，直接存在代码中了，保存到了 Git，这也和 Nova 一样，我不喜欢这种做法
- 使用了不少第三方 JS 包
