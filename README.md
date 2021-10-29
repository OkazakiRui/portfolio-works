# portfolio works
## 概要
自分のポートフォリオを作成していて、作品をいちいち登録するのは面倒。。。作品を登録するとRESTfulAPIとして提供できるサービスが欲しい！
というので開発を始めたサービス。

## DB tables

### user table
| カラム名       | データ型    | null許容 | ai  | option                  | 備考                                                         |
| -------------- |:----------- |:-------- |:--- | ----------------------- |:------------------------------------------------------------ |
| student_id     | int         | not null |     | unsigned<br>primary key |                                                              |
| first_name     | varchar(32) | not null |     |                         | 修正可能                                                     |
| last_name      | varchar(32) | not null |     |                         | 修正可能                                                     |
| graduated_year | tinyint     | not null |     | unsigned                |                                                              |
| created_at     | datetime    | not null |     |                         | default : default current_timestamp                          |
| updated_at     | datetime    | not null |     |                         | default : default current_timestamp update current_timestamp |
| deleted_at     | datetime    |          |     |                         | default : null                                               |

### login table
| カラム名   | データ型     | null許容 | ai  | option                 | 備考                                                         |
| ---------- |:------------ |:-------- |:--- | ---------------------- |:------------------------------------------------------------ |
| student_id | int          | not null |     | unsigned<br>primary key |                                                              |
| password   | varchar(256) | not null |     |                        | 各個人に入力してもらう<br>パスワードの変更<br>リセットは管理者 |
| created_at | datetime     | not null |     |                        | default : default current_timestamp                          |
| updated_at | datetime     | not null |     |                        | default : default current_timestamp update current_timestamp |

### works table
| カラム名         | null許容 | データ型    | ai             | option                  | 備考                                                         |
|:---------------- |:-------- |:----------- |:-------------- |:----------------------- |:------------------------------------------------------------ |
| id               | not null | int         | auto_increment | unsigned<br>primary key |                                                              |
| title            | not null | varchar(64) |                |                         |                                                              |
| description      |          | text        |                |                         |                                                              |
| using_language   |          | text        |                |                         | jsonを格納する 使用言語                                      |
| using_tool       |          | text        |                |                         | jsonを格納する 使用ツール                                    |
| role             |          | text        |                |                         | jsonを格納する 役割                                          |
| creation_hour    |          | int         |                |                         |                                                              |
| thumbnail        |          | text(256)   |                |                         | ~~AWS s3を使う~~ click サーバーに置く 年別に管理する         |
| thumbnail_width  |          | tinyint     |                | unsigned                |                                                              |
| thumbnail_height |          | tinyint     |                | unsigned                |                                                              |
| team_production  | not null | tinyint(1)  | default : 0    |                         | 1でチーム制作                                                |
| published        | not null | tinyint(1)  | default : 0    |                         | 1で公開                                                      |
| created_at       | not null | datetime    |                |                         | default : default current_timestamp                          |
| updated_at       | not null | datetime    |                |                         | default : default current_timestamp update current_timestamp |
| deleted_at       |          | datetime    |                |                         | default : null                                               |

### user_works table
| カラム名   | null許容 | データ型 | ai  | option                  | 備考 |
|:---------- |:-------- |:-------- |:---:|:----------------------- |:---- |
| student_id | not null | int      |     | unsigned<br>primary key |      |
| works_id   | not null | int      |     | unsigned<br>primary key |      |

### works_URL
| カラム名   | null許容 | データ型   | ai             | option                  | 備考                                                         |
|:---------- |:-------- |:---------- |:-------------- |:----------------------- |:------------------------------------------------------------ |
| id         | not null | int        | auto_increment | unsigned<br>primary key |                                                              |
| works_id   | not null | int        |                |                         |                                                              |
| URL_name   | not null | text       |                |                         |                                                              |
| URL        | not null | text       |                |                         |                                                              |
| created_at | not null | datetime   |                |                         | default : default current_timestamp                          |
| updated_at | not null | datetime   |                |                         | default : default current_timestamp update current_timestamp |

### works_text
| カラム名   | null許容 | データ型 | ai             | option                  | 備考                                                         |
|:---------- |:-------- |:-------- |:-------------- |:----------------------- |:------------------------------------------------------------ |
| id         | not null | int      | auto_increment | unsigned<br>primary key |                                                              |
| works_id   | not null | int      |                |                         |                                                              |
| text_name  | not null | int      |                |                         |                                                              |
| text       | not null | text     |                |                         |                                                              |
| created_at | not null | datetime |                |                         | default : default current_timestamp                          |
| updated_at | not null | datetime |                |                         | default : default current_timestamp update current_timestamp |
