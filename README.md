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
