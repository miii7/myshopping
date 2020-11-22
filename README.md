# アプリケーション(My Shopping)の概要
* 楽天APIを実装し、検索した商品に「Really Want（絶対ほしい）」及び「Want（ほしい」の2種類のボタンでほしい商品に優先順位をつけたり、一言メモを付けることができるアプリ。

## アプリケーションリンク
* https://myshopping2020.herokuapp.com
  * ログイン用メールアドレス：php2020＠mail.com
  * パスワード：myshopping

## デモ画像、動画
* [サイトマップ](https://cacoo.com/diagrams/KkaqCAROABgLRVVR/042A3)
* [ワイヤーフレーム](https://cacoo.com/diagrams/xIggmeWwZ1eLm3Pe/E3594)
* [データベース図](https://cacoo.com/diagrams/isWyhOJurRLbQEVe/35F68)
* 操作画面
  [![myshopping](https://img.youtube.com/vi/yXIx2v9bgJE/0.jpg)](https://www.youtube.com/watch?v=yXIx2v9bgJE)

## 機能一覧
* 商品検索機能
* ユーザ登録機能
* ログイン機能
* 2種類のWant（ほしい）ボタン機能
* CRUD機能
* ページネーション機能
* カウント機能
* ランキング機能

## 使用している技術一覧
* PHP 7.3
* Laravel Framework 6.20
* My SQL 5.7

## 使用したライブラリ
* 楽天商品検索API（SDKによるデータ取得）</br>　
https://webservice.rakuten.co.jp/api/ichibaitemsearch/#aboutSdk

## こだわった点
* 楽天APIのデータは、検索した際にDBに保存するとデータが沢山保存されてしまうので、Really Want、はWantが押下された際に保存するようにした。
* 保存したかどうかの表示を、楽天APIからの検索時にも反映するために、楽天コードでも判定するようにした。

## 苦労した点
* ランキング表示をするため、商品にReally Wantしている人の人数をカウントするのが難しかった。
```     $items = Item::withCount('reallyWantUsers')->having('really_want_users_count', '>', 0)
            ->orderBy('really_want_users_count', 'desc')
            ->take(10)
            ->get();
```

* また、上記の箇所について、開発環境と本番環境で使用しているデータベースが異なり、withCountにより作成されるreally_want_users_countカラムをhavingの箇所で指定できないという問題が生じたため、最終的には下記のように修正した。
```    {   $query = Item::withCount('reallyWantUsers');
        $items = Item::fromSub($query, 'alias')
            ->where('really_want_users_count', '>', 0)
            ->orderBy('really_want_users_count', 'desc')
            ->take(10)
            ->get();
```

## ユーザ目線で意識した点
* 適切な商品データを検索しUXを高めるため、下限価格を100円、上限価格を9,999,999円と指定した。
* 各商品によって名称の長さが異なったので、デザイン的に統一感を持たせるため、名称は2行までと指定し、それより長い場合は名称の最後に「...」と表示するようにした。
