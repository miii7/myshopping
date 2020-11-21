#アプリケーションの概要
楽天APIを実装し、検索した商品に「Really Want（絶対ほしい）」及び「Want（ほしい」の2種類のボタンでほしい商品に優先順位をつけたり、一言メモをすることができるアプリ。

##画像、動画
* [サイトマップ](https://cacoo.com/diagrams/xIggmeWwZ1eLm3Pe/E3594)
* [ワイヤーフレーム](https://cacoo.com/diagrams/xIggmeWwZ1eLm3Pe/E3594)
* [データベース図](https://cacoo.com/diagrams/isWyhOJurRLbQEVe/35F68)
* [操作画面]（https://youtu.be/EYNzyvPbnM0）

##機能一覧
* 商品検索機能
* ユーザ登録機能
* ログイン機能
* 2種類のWant（ほしい）ボタン機能
* CRUD機能
* ページネーション機能
* カウント機能
* ランキング機能

##使用している技術一覧
Laravel Framework 6.20.2
PHP 7.3.23-2
My SQL 5.7.32

##こだわったポイント
* 楽天APIのデータは、検索した際にDBに保存するとデータが沢山保存されてしまうので、Really Want、はWantが押下された際に保存するようにした。
* 保存したかどうかの表示を、楽天APIからの検索時にも反映するために、楽天コードでも判定するようにした。

##苦労したポイント
* ランキング表示をするために、商品ごとにReally Wantしている人の人数をカウントするのが難しかった。

##ユーザ目線で意識した点
* 適切な商品データを検索しUXを高めるため、下限価格を100円、上限価格を9,999,999円と指定した。
* 各商品によって名称の長さが異なったので、デザイン的に統一感を持たせるため、名称は2行までと指定し、それより長い場合は名称の最後に「...」と表示するようにした。
