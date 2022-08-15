<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([[
            'title' => 'Vue.js',
            'content' => 'Vue.js（ヴュー・ジェイエス）またはVueは、Webアプリケーションにおけるユーザーインターフェイスを構築するための、オープンソースのJavaScriptフレームワークである[4]。他のJavaScriptライブラリを使用するプロジェクトへの導入において、容易になるように設計されている。一方で高機能なシングルページアプリケーション（SPA）を構築することも可能である。', 
            'created_at' => '2021/01/01 11:11:11'
        ]]);

        DB::table('news')->insert([[
            'title' => 'JavaScript',
            'content' => 'JavaScript（ジャバスクリプト）とは、プログラミング言語のひとつである。JavaScriptはプロトタイプベースのオブジェクト指向スクリプト言語であるが、クラスなどのクラスベースに見られる機能も取り込んでいる。
                          利用される場面はWebサイト・Webアプリ・バックエンド・デスクトップアプリ・モバイルアプリなど、ブラウザからサーバ、デスクトップからスマートフォンまで多岐にわたっている。
                          Javaと似た名称を持つが、異なるプログラミング言語である（#歴史を参照）。', 
            'created_at' => '2021/06/01 11:11:11'
        ]]);

        DB::table('news')->insert([[
            'title' => 'Cascading Style Sheets',
            'content' => 'Cascading Style Sheets（CSS、カスケーディング・スタイル・シート、カスケード・スタイル・シート）は、HTML や XML の要素をどのように修飾（表示）するかを指示する仕様の一つで、World Wide Web Consortium (W3C) がとりまとめ勧告する。文書の構造と体裁を分離させるという理念を実現するために提唱されたスタイルシートの具体的な仕様の一つ。
                        CSS は HTML で表現可能と考えられるデザインの大部分を実現できる要素を取り入れつつ、新たなデザイン機能を備える。以下の点を特徴とする。      
                        ページを表示するメディアに合わせてスタイルシートを切り替えることで、メディアごとに表示を変化させることができる。
                        ユーザーエージェント（多くの場合ウェブブラウザ）、ウェブサイト制作者、ユーザがそれぞれ定義した CSS のもたらす効果を重ね合わせる（カスケードする）ことができる[注釈 1]。
                        CSS は、1994年にWWW生誕の地である CERN に勤務するホーコン・ウィウム・リーにより提唱された。',
            'created_at' => '2021/02/01 11:11:11' 
        ]]);

        DB::table('news')->insert([[
            'title' => 'Java',
            'content' => 'Java（ジャバ、ジャヴァ）は、汎用プログラミング言語とソフトウェアプラットフォームの双方を指している総称ブランドである[6]。オラクルおよびその関連会社の登録商標である。1996年にサン・マイクロシステムズによって市場リリースされ、2010年に同社がオラクルに吸収合併された事によりJavaの版権もそちらに移行した。
            プログラミング言語Javaは、C++に類似の構文、クラスベースのオブジェクト指向、マルチスレッド、ガーベジコレクション、コンポーネントベース、分散コンピューティングといった特徴を持ち、平易性重視のプログラム書式による堅牢性と、仮想マシン上での実行によるセキュリティ性およびプラットフォーム非依存性が理念とされている。Javaプラットフォームは、Javaプログラムの実行環境または、実行環境と開発環境の双方を統合したソフトウェアであり、ビジネスサーバ、モバイル機器、組み込みシステム、スマートカードといった様々なハードウェア環境に対応したソフトウェア形態で提供されている。その中枢技術であるJava仮想マシンは各プラットフォーム環境間の違いを吸収しながら、Javaプログラムの適切な共通動作を実現する機能を備えている[7]。このテクノロジは「write once, run anywhere」と標榜されていた[8]。  
            2019年の時点でGitHubによると[9]、Javaは特にクライアント/サーバモデルのWebアプリケーションで使用されている最も人気の高いプログラミング言語の1つであり[9]、全世界でおよそ900万人の開発者がいるとレポートされている[10]。最新バージョンは、2021年3月にリリースされたJava 16と、2018年9月にリリースされたJava 11の長期サポート（LTS）版、2014年3月にリリースされたJava 8のLTS版である。オラクルは未解決のセキュリティ問題によるリスクを回避するために、旧バージョンのアンインストールと新バージョンへの移行を強く推奨している[11]。', 
            'created_at' => '2021/03/01 11:11:11'
        ]]);

        DB::table('news')->insert([[
            'title' => 'PHP',
            'content' => 'PHP（ピー・エイチ・ピー）は、 "The PHP Group" によってコミュニティベースで開発[2]されているオープンソースの汎用プログラミング言語およびその公式の処理系であり、特にサーバーサイドで動的なウェブページを作成するための機能を多く備えていることを特徴とする[3]。 名称の PHP は再帰的頭字語として、 "PHP: Hypertext Preprocessor" を意味[4][5]するとされており、「PHPはHTMLのプリプロセッサである」とPHP自身を再帰的に説明している。', 
            'created_at' => '2021/04/01 11:11:11'
        ]]);

        DB::table('news')->insert([[
            'title' => 'Vue.js',
            'content' => 'Vue.js（ヴュー・ジェイエス）またはVueは、Webアプリケーションにおけるユーザーインターフェイスを構築するための、オープンソースのJavaScriptフレームワークである[4]。他のJavaScriptライブラリを使用するプロジェクトへの導入において、容易になるように設計されている。一方で高機能なシングルページアプリケーション（SPA）を構築することも可能である。', 
            'created_at' => '2022/01/01 11:11:11'
        ]]);

        DB::table('news')->insert([[
            'title' => 'JavaScript',
            'content' => 'JavaScript（ジャバスクリプト）とは、プログラミング言語のひとつである。JavaScriptはプロトタイプベースのオブジェクト指向スクリプト言語であるが、クラスなどのクラスベースに見られる機能も取り込んでいる。
                          利用される場面はWebサイト・Webアプリ・バックエンド・デスクトップアプリ・モバイルアプリなど、ブラウザからサーバ、デスクトップからスマートフォンまで多岐にわたっている。
                          Javaと似た名称を持つが、異なるプログラミング言語である（#歴史を参照）。', 
            'created_at' => '2022/06/01 11:11:11'
        ]]);

        DB::table('news')->insert([[
            'title' => 'Cascading Style Sheets',
            'content' => 'Cascading Style Sheets（CSS、カスケーディング・スタイル・シート、カスケード・スタイル・シート）は、HTML や XML の要素をどのように修飾（表示）するかを指示する仕様の一つで、World Wide Web Consortium (W3C) がとりまとめ勧告する。文書の構造と体裁を分離させるという理念を実現するために提唱されたスタイルシートの具体的な仕様の一つ。
                        CSS は HTML で表現可能と考えられるデザインの大部分を実現できる要素を取り入れつつ、新たなデザイン機能を備える。以下の点を特徴とする。      
                        ページを表示するメディアに合わせてスタイルシートを切り替えることで、メディアごとに表示を変化させることができる。
                        ユーザーエージェント（多くの場合ウェブブラウザ）、ウェブサイト制作者、ユーザがそれぞれ定義した CSS のもたらす効果を重ね合わせる（カスケードする）ことができる[注釈 1]。
                        CSS は、1994年にWWW生誕の地である CERN に勤務するホーコン・ウィウム・リーにより提唱された。',
            'created_at' => '2022/02/01 11:11:11' 
        ]]);

        DB::table('news')->insert([[
            'title' => 'Java',
            'content' => 'Java（ジャバ、ジャヴァ）は、汎用プログラミング言語とソフトウェアプラットフォームの双方を指している総称ブランドである[6]。オラクルおよびその関連会社の登録商標である。1996年にサン・マイクロシステムズによって市場リリースされ、2010年に同社がオラクルに吸収合併された事によりJavaの版権もそちらに移行した。
            プログラミング言語Javaは、C++に類似の構文、クラスベースのオブジェクト指向、マルチスレッド、ガーベジコレクション、コンポーネントベース、分散コンピューティングといった特徴を持ち、平易性重視のプログラム書式による堅牢性と、仮想マシン上での実行によるセキュリティ性およびプラットフォーム非依存性が理念とされている。Javaプラットフォームは、Javaプログラムの実行環境または、実行環境と開発環境の双方を統合したソフトウェアであり、ビジネスサーバ、モバイル機器、組み込みシステム、スマートカードといった様々なハードウェア環境に対応したソフトウェア形態で提供されている。その中枢技術であるJava仮想マシンは各プラットフォーム環境間の違いを吸収しながら、Javaプログラムの適切な共通動作を実現する機能を備えている[7]。このテクノロジは「write once, run anywhere」と標榜されていた[8]。  
            2019年の時点でGitHubによると[9]、Javaは特にクライアント/サーバモデルのWebアプリケーションで使用されている最も人気の高いプログラミング言語の1つであり[9]、全世界でおよそ900万人の開発者がいるとレポートされている[10]。最新バージョンは、2021年3月にリリースされたJava 16と、2018年9月にリリースされたJava 11の長期サポート（LTS）版、2014年3月にリリースされたJava 8のLTS版である。オラクルは未解決のセキュリティ問題によるリスクを回避するために、旧バージョンのアンインストールと新バージョンへの移行を強く推奨している[11]。', 
            'created_at' => '2022/03/01 11:11:11'
        ]]);

        DB::table('news')->insert([[
            'title' => 'PHP',
            'content' => 'PHP（ピー・エイチ・ピー）は、 "The PHP Group" によってコミュニティベースで開発[2]されているオープンソースの汎用プログラミング言語およびその公式の処理系であり、特にサーバーサイドで動的なウェブページを作成するための機能を多く備えていることを特徴とする[3]。 名称の PHP は再帰的頭字語として、 "PHP: Hypertext Preprocessor" を意味[4][5]するとされており、「PHPはHTMLのプリプロセッサである」とPHP自身を再帰的に説明している。', 
            'created_at' => '2022/04/01 11:11:11'
        ]]);
    }
}
