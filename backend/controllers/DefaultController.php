<?php

namespace backend\controllers;

use Yii;
use common\models\Country;
use common\models\Language;
use common\models\Option;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'general','flushcache','clearassets','filemanager','status', 'mark', 'deletedir'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSystem()
    {
        return $this->render('system');
    }
    public function actionGeneral()
    {
        // Check before  //
        $a = Option::find()->count();

        if ($a!=14) {
            Option::deleteAll();
            $model = new Option();
        }else{
            $models = Option::find()->all();
            $model = new Option();
            foreach ($models as $item) {

                if($item->name=='site_url'){$model->site_url = $item->value;}
                if($item->name=='site_admin_email'){$model->site_admin_email = $item->value;}
                if($item->name=='site_admin_tel'){$model->site_admin_tel = $item->value;}
                if($item->name=='membership'){$model->membership = $item->value;}
                if($item->name=='default_role'){$model->default_role = $item->value;}
                if($item->name=='site_container'){$model->site_container = $item->value;}
                if($item->name=='site_sidebar'){$model->site_sidebar = $item->value;}
                if($item->name=='site_timezone'){$model->site_timezone  = $item->value;}
                if($item->name=='site_date'){$model->site_date = $item->value;}
                if($item->name=='site_language'){$model->site_language = $item->value;}
                if($item->name=='default_post_category'){$model->default_post_category = $item->value;}
                if($item->name=='show_post'){$model->show_post = $item->value;}
                if($item->name=='default_allow_comment'){$model->default_allow_comment  = $item->value;}
                if($item->name=='default_allow_meta'){$model->default_allow_meta  = $item->value;}
            }

        }
        $model->scenario = 'start';

        if ($model->load(Yii::$app->request->post())) {
            $count = count($_POST['Option']);
            if ($count==14) {
                $site_url_old = Option::find()->where(['name'=>'site_url'])->one();
                foreach ($_POST['Option'] as $key=>$value) {
                    if ($a!=14) {
                        $model2 = new Option();
                        $model2->name = $key;
                        $model2->status = "1";
                        $model2->value = $value;
                        $model2->save();
                    }else{
                        $model2 = Option::find()->where('name=:name')->params([':name'=>$key])->one();
                        if ($model2!=null) {
                            $model2->value = $value;
                            $model2->save();
                        }
                    }
                }
                $site_url = Option::find()->where(['name'=>'site_url'])->one();
                if ($site_url!=null and $site_url_old!=null) {

                    $site_url->value = explode('://', $site_url->value)[1];
                    $site_url_old->value = explode('://', $site_url_old->value)[1];
                    ////////////      Begin Replace Action    /////////////

                    $carousels = Carousel::find()->all();
                    foreach ($carousels  as $carousel) {
                        $new_value =  str_replace($site_url_old->value,$site_url->value,$carousel->image);
                        $carousel->image = $new_value;
                        $carousel->save();
                    }

                    $comments = Comment::find()->all();
                    foreach ($comments  as $comment) {
                        $new_value =  str_replace($site_url_old->value,$site_url->value,$comment->comment);
                        $comment->comment = $new_value;
                        $comment->save();
                    }
                    $faqs = Faq::find()->all();
                    foreach ($faqs  as $faq) {
                        $new_value1 =  str_replace($site_url_old->value,$site_url->value,$faq->question);
                        $new_value2 =  str_replace($site_url_old->value,$site_url->value,$faq->answer);
                        $faq->question = $new_value1;
                        $faq->answer = $new_value2;
                        $faq->save();
                    }

                    $galleries = Gallery::find()->all();
                    foreach ($galleries  as $gallery) {
                        $new_value1 =  str_replace($site_url_old->value,$site_url->value,$gallery->image);
                        $new_value2 =  str_replace($site_url_old->value,$site_url->value,$gallery->file);
                        $gallery->image = $new_value1;
                        $gallery->file = $new_value2;
                        $gallery->save();
                    }

                    $pages = Page::find()->all();
                    foreach ($pages  as $page) {
                        $new_value =  str_replace($site_url_old->value,$site_url->value,$page->content);
                        $page->content = $new_value;
                        $page->save();
                    }

                    $posts = Post::find()->all();
                    foreach ($posts  as $post) {
                        $new_value1 =  str_replace($site_url_old->value,$site_url->value,$post->image);
                        $new_value2 =  str_replace($site_url_old->value,$site_url->value,$post->content);
                        $post->image = $new_value1;
                        $post->content = $new_value2;
                        $post->save();
                    }

                    $profiles = Profile::find()->all();
                    foreach ($profiles  as $profile) {
                        $new_value =  str_replace($site_url_old->value,$site_url->value,$profile->image);
                        $profile->image = $new_value;
                        $profile->save();
                    }

                    $important_days = ImportantDay::find()->all();
                    foreach ($important_days  as $important_day) {
                        $new_value =  str_replace($site_url_old->value,$site_url->value,$important_day->image);
                        $important_day->image = $new_value;
                        $important_day->save();
                    }

                    $menus = Menu::find()->where(['type'=>'link'])->all();
                    foreach ($menus  as $menu) {
                        $new_value =  str_replace($site_url_old->value,$site_url->value,$menu->item);
                        $menu->item = $new_value;
                        $menu->save();
                    }

//                    $banners = Banner::find()->all();
//                    foreach ($banners  as $banner) {
//                        $new_value =  str_replace($site_url_old->value,$site_url->value,$banner->image);
//                        $banner->item = $new_value;
//                        $banner->save();
//                    }



                    ////////////      End Replace Action      /////////////
                }
                Yii::$app->session->setFlash('success',Yii::t('yii','Successfully saved.'));
                return $this->render('general', [
                    'model' => $model,
                ]);

            }else {
                Yii::$app->session->setFlash('error',Yii::t('yii','Something Error!!!'));
                return $this->render('general', [
                    'model' => $model,
                ]);
            }

        } else {
            return $this->render('general', [
                'model' => $model,
            ]);
        }
    }
    public function actionFlushCache()
    {
        \Yii::$app->cache->flush();
        \Yii::$app->session->setFlash('success', \Yii::t('yii', 'Cache flushed'));

        return $this->redirect('system');
    }
    public function actionClearAssets()
    {
        foreach(glob(\Yii::$app->assetManager->basePath . DIRECTORY_SEPARATOR . '*') as $asset){
            if(is_link($asset)){
                unlink($asset);
            } elseif(is_dir($asset)){
                $this->deleteDir($asset);
            } else {
                unlink($asset);
            }
        }
        \Yii::$app->session->setFlash('success', \Yii::t('yii', 'Assets cleared'));
        return $this->redirect('system');
    }
    private function deleteDir($directory)
    {
        $iterator = new \RecursiveDirectoryIterator($directory, \RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::CHILD_FIRST);
        foreach($files as $file) {
            if ($file->isDir()){
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        return rmdir($directory);
    }
    public function actionFileManager()
    {
        return $this->render('file-manager');
    }
    public function actionStatus($id,$status,$model,$controller)
    {
        $model = $this->findModel($id,$model);
        if ($status==0 or $status==1 or $status==2 or $status==3) {

            $model->status = $status;
            if ($status==0) {
                if ($controller=='comment') {
                    $model->deleted_at  = null;
                    $model->approved_at  = null;
                    $model->user_id_approved  = null;
                }
                if ($controller=='carousel' or $controller=='gallery' or $controller=='post' or
                    $controller=='page' or $controller=='poll') {
                    $model->deleted_at  = null;
                    $model->user_id_deleted  = null;
                    $model->updated_at  = date('Y-m-d H:i:s');
                    $model->user_id_edited  = Yii::$app->user->id;
                }
                if ($controller=='role') {
                    $model->updated_at  = date('Y-m-d H:i:s');
                }
            }
            elseif ($status==1) {
                if ($controller=='comment') {
                    $model->deleted_at  = null;
                    $model->approved_at  = date('Y-m-d H:i:s');
                    $model->user_id_approved  = \Yii::$app->user->id;
                }
                if ($controller=='carousel' or $controller=='gallery' or $controller=='post' or
                    $controller=='page' or $controller=='poll') {
                    $model->deleted_at  = null;
                    $model->user_id_deleted  = null;
                    $model->updated_at  = date('Y-m-d H:i:s');
                    $model->user_id_edited  = Yii::$app->user->id;
                }
                if ($controller=='role') {
                    $model->updated_at  = date('Y-m-d H:i:s');
                }
            }
            elseif ($status==2) {
                if ($controller=='comment') {
                    $model->deleted_at  = date('Y-m-d H:i:s');
                    $model->approved_at  = null;
                    $model->user_id_approved  = null;
                }
                if ($controller=='carousel' or $controller=='gallery' or $controller=='post' or
                    $controller=='page' or $controller=='poll') {
                    $model->deleted_at  = date('Y-m-d H:i:s');
                    $model->user_id_deleted  = Yii::$app->user->id;
                    $model->updated_at  = date('Y-m-d H:i:s');
                    $model->user_id_edited  = Yii::$app->user->id;
                }

            }elseif ($status==3) {
                if ($controller=='comment') {
                    $model->deleted_at  = null;
                    $model->approved_at  = null;
                    $model->user_id_approved  = null;
                }

            }
            $model->save(false);
            \Yii::$app->session->setFlash('success',\Yii::t('yii','Successfully saved.'));
        }else{
            throw new NotFoundHttpException(\Yii::t('yii','The requested page does not exist.'));
        }
        return $this->redirect(['/'.$controller.'/index']);
    }
    public function actionMark($model,$controller)
    {

        if (isset($_POST['action']) and $this->clearEmptyString($_POST['action']) and
            isset($_POST['selection']) and !empty($_POST['selection'])
        ) {
            $ids = implode(',',$_POST['selection']);
            switch ($model) {
                case 'carousel':
                     Carousel::updateAll([
                         'status' => $_POST['action'],
                         'updated_at' => date('Y-m-d H:i:s'),
                         'user_id_edited' => \Yii::$app->user->id,
                         'deleted_at' => ($_POST['action']==2)?date('Y-m-d H:i:s'):null,
                         'user_id_deleted' => ($_POST['action']==2)?\Yii::$app->user->id:null,
                     ], 'id IN ('.$ids.')');break;
                case 'comment':
                    Comment::updateAll([
                        'status' => $_POST['action'],
                        'approved_at' => ($_POST['action']==1)?date('Y-m-d H:i:s'):null,
                        'user_id_approved' => ($_POST['action']==1)?\Yii::$app->user->id:null,
                        'deleted_at' => ($_POST['action']==2)?date('Y-m-d H:i:s'):null,
                    ], 'id IN ('.$ids.')');break;
                case 'country':
                    Country::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'faq':
                    Faq::updateAll([ 'status' => $_POST['action']], 'id IN ('.$ids.') and answer IS NOT NULL');
                    \Yii::$app->session->setFlash('warning',\Yii::t('yii','Not Answered Questions are not apply'));
                    break;
                case 'gallery':
                    Gallery::updateAll([
                        'status' => $_POST['action'],
                        'updated_at' => date('Y-m-d H:i:s'),
                        'user_id_edited' => \Yii::$app->user->id,
                        'deleted_at' => ($_POST['action']==2)?date('Y-m-d H:i:s'):null,
                        'user_id_deleted' => ($_POST['action']==2)?\Yii::$app->user->id:null,
                    ], 'id IN ('.$ids.')');break;
                case 'language':
                    Language::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'meta-tag':
                    MetaTag::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'option':
                    Option::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'page':
                    Page::updateAll([
                        'status' => $_POST['action'],
                        'updated_at' => date('Y-m-d H:i:s'),
                        'user_id_edited' => \Yii::$app->user->id,
                        'deleted_at' => ($_POST['action']==2)?date('Y-m-d H:i:s'):null,
                        'user_id_deleted' => ($_POST['action']==2)?\Yii::$app->user->id:null,
                    ], 'id IN ('.$ids.')');break;
                case 'poll':
                    Poll::updateAll([
                        'status' => $_POST['action'],
                        'updated_at' => date('Y-m-d H:i:s'),
                        'user_id_edited' => \Yii::$app->user->id,
                        'deleted_at' => ($_POST['action']==2)?date('Y-m-d H:i:s'):null,
                        'user_id_deleted' => ($_POST['action']==2)?\Yii::$app->user->id:null,
                    ], 'id IN ('.$ids.')');break;
                case 'post':
                    Post::updateAll([
                        'status' => $_POST['action'],
                        'updated_at' => date('Y-m-d H:i:s'),
                        'user_id_edited' => \Yii::$app->user->id,
                        'deleted_at' => ($_POST['action']==2)?date('Y-m-d H:i:s'):null,
                        'user_id_deleted' => ($_POST['action']==2)?\Yii::$app->user->id:null,
                    ], 'id IN ('.$ids.')');break;
                case 'post-category':
                    PostCategory::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'province':
                    Province::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'reception':
                    Reception::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'region':
                    Region::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'stat':
                    Stat::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'province-stat':
                    ProvinceStat::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'banner':
                    Banner::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'important-day':
                    ImportantDay::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'menu':
                    Menu::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'role':
                    Role::updateAll(['status' => $_POST['action'],'updated_at' => date('Y-m-d H:i:s')], 'id IN ('.$ids.')');break;
                case 'subscribe':
                    Subscribe::updateAll(['status' => $_POST['action']], 'id IN ('.$ids.')');break;
                case 'user':
                    if ($_POST['action']==3) {
                        UserToken::deleteAll('user_id IN (' . $ids . ')');
                        UserAuth::deleteAll('user_id IN (' . $ids . ')');
                        Profile::deleteAll('user_id IN (' . $ids . ')');
                        Comment::deleteAll('user_id IN (' . $ids . ')');
                        Faq::deleteAll('user_id IN (' . $ids . ')');

                        // All those user's items will be consist of current user  //

                        ////////     Poll     ////////

                        Poll::updateAll([
                            'user_id' => \Yii::$app->user->id,
                        ], 'user_id IN (' . $ids . ')');

                        Poll::updateAll([
                            'user_id_edited' => \Yii::$app->user->id,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_edited IN (' . $ids . ')');

                        Poll::updateAll([
                            'user_id_deleted' => \Yii::$app->user->id,
                            'deleted_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_deleted IN (' . $ids . ')');

                        ////////     Post     ////////

                        Post::updateAll([
                            'user_id' => \Yii::$app->user->id,
                        ], 'user_id IN (' . $ids . ')');

                        Post::updateAll([
                            'user_id_edited' => \Yii::$app->user->id,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_edited IN (' . $ids . ')');

                        Post::updateAll([
                            'user_id_deleted' => \Yii::$app->user->id,
                            'deleted_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_deleted IN (' . $ids . ')');

                        ////////     Faq     ////////

                        Faq::updateAll([
                            'user_id_answered' => \Yii::$app->user->id,
                            'answered_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_answered IN (' . $ids . ')');

                        ////////     Comment     ////////

                        Comment::updateAll([
                            'user_id_approved' => \Yii::$app->user->id,
                            'approved_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_approved IN (' . $ids . ')');

                        ////////     Page     ////////

                        Page::updateAll([
                            'user_id' => \Yii::$app->user->id,
                        ], 'user_id IN (' . $ids . ')');

                        Page::updateAll([
                            'user_id_edited' => \Yii::$app->user->id,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_edited IN (' . $ids . ')');

                        Page::updateAll([
                            'user_id_deleted' => \Yii::$app->user->id,
                            'deleted_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_deleted IN (' . $ids . ')');

                        ////////     Carousel     ////////

                        Carousel::updateAll([
                            'user_id' => \Yii::$app->user->id,
                        ], 'user_id IN (' . $ids . ')');

                        Carousel::updateAll([
                            'user_id_edited' => \Yii::$app->user->id,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_edited IN (' . $ids . ')');

                        Carousel::updateAll([
                            'user_id_deleted' => \Yii::$app->user->id,
                            'deleted_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_deleted IN (' . $ids . ')');

                        ////////     Gallery     ////////

                        Gallery::updateAll([
                            'user_id' => \Yii::$app->user->id,
                        ], 'user_id IN (' . $ids . ')');

                        Gallery::updateAll([
                            'user_id_edited' => \Yii::$app->user->id,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_edited IN (' . $ids . ')');

                        Gallery::updateAll([
                            'user_id_deleted' => \Yii::$app->user->id,
                            'deleted_at' => date('Y-m-d H:i:s'),
                        ], 'user_id_deleted IN (' . $ids . ')');

                        ////////     Delete Users     ////////

                        User::deleteAll('id IN (' . $ids . ')');

                    }else {
                        User::updateAll([
                            'status' => $_POST['action'],
                            'user_id_edited' => \Yii::$app->user->id,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ], 'id IN (' . $ids . ')');
                    }
                    break;
                default:  null; break;
            }
            \Yii::$app->session->setFlash('success',\Yii::t('yii','Successfully applied.'));
            return $this->redirect(['/'.$controller.'/index']);
        }else{
            \Yii::$app->session->setFlash('error',\Yii::t('yii','Error!!! Do You not mark checkbox or not choose apply action?'));
            return $this->redirect(['/'.$controller.'/index']);
        }
    }
    protected function findModel($id,$model)
    {
        switch ($model) {
            case 'carousel':
                $model = Carousel ::findOne($id); break;
            case 'comment':
                $model = Comment ::findOne($id); break;
            case 'country':
                $model = Country ::findOne($id); break;
            case 'faq':
                $model = Faq ::find()->where('`id`=:id and `answer` IS NOT NULL ')->params([':id'=>$id])->one(); break;
            case 'gallery':
                $model = Gallery ::findOne($id); break;
            case 'province-stat':
                $model = ProvinceStat ::findOne($id); break;
            case 'banner':
                $model = Banner ::findOne($id); break;
            case 'stat':
                $model = Stat ::findOne($id); break;
            case 'important-day':
                $model = ImportantDay ::findOne($id); break;
            case 'reception':
                $model = Reception ::findOne($id); break;
            case 'virtual-reception':
                $model = VirtualReception ::findOne($id); break;
            case 'language':
                $model = Language ::findOne($id); break;
            case 'meta-tag':
                $model = MetaTag ::findOne($id); break;
            case 'option':
                $model = Option ::findOne($id); break;
            case 'page':
                $model = Page ::findOne($id); break;
            case 'poll':
                $model = Poll ::findOne($id); break;
            case 'menu':
                $model = Menu ::findOne($id); break;
            case 'post':
                $model = Post ::findOne($id); break;
            case 'post-category':
                $model = PostCategory ::findOne($id); break;
            case 'province':
                $model = Province ::findOne($id); break;
            case 'region':
                $model = Region ::findOne($id); break;
            case 'role':
                $model = Role ::findOne($id); break;
            case 'subscribe':
                $model = Subscribe ::findOne($id); break;
            case 'user':
                $model = User ::findOne($id); break;
            default:
                $model = null; break;
        }
        if ($model!== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(\Yii::t('yii','The requested page does not exist.'));
        }
    }
    public static function getVisibility($id=null)
    {
        $data = [
            '1'=>\Yii::t('yii','Public'),
            '2'=>\Yii::t('yii','Protected'),
            '3'=>\Yii::t('yii','Private'),
        ];
        if ($id) {
            return $data[$id];
        }else {
            return $data;
        }
    }
    public static function getMenuCategory($cat=null)
    {
        $data = [
            'main-menu'=>\Yii::t('yii','Main Menu'),
            'top-menu'=>\Yii::t('yii','Top Menu'),
            'left-menu'=>\Yii::t('yii','Left Menu'),
            'right-menu'=>\Yii::t('yii','Right Menu'),
            'bottom-menu'=>\Yii::t('yii','Bottom Menu'),
        ];
        if ($cat) {
            return $data[$cat];
        }else {
            return $data;
        }
    }
    public static function getMenuType($type=null)
    {
        $data = [
            'page'=>\Yii::t('yii','Page'),
            'post'=>\Yii::t('yii','Post'),
            'category'=>\Yii::t('yii','Category'),
            'link'=>\Yii::t('yii','Link'),
        ];
        if ($type) {
            return $data[$type];
        }else {
            return $data;
        }
    }
    public static function getMenuIcon($icon,$style=null)
    {
        $str = explode('-',$icon);
        if ($str[0]='fa') {
            return '<i class="fa '.$icon.'" style="'.$style.'" ></i>';
        }elseif($str[0]='glyphicon') {
            return '<i class="glyphicon '.$icon.'" style="'.$style.'" ></i>';
        }
    }
    public static function getStatus0 ($id=null)
    {
        $data = [
            '0'=>\Yii::t('yii','No Active'),
            '1'=>\Yii::t('yii','Active'),
            '2'=>\Yii::t('yii','In Trash'),
        ];
        if (is_numeric($id)) {
            return $data[$id];
        }else {
            return $data;
        }
    }
    public static function getStatus1 ($id=null)
    {
        $data = [
            '0'=>\Yii::t('yii','No Active'),
            '1'=>\Yii::t('yii','Active'),
        ];
        if (is_numeric($id)) {
            return $data[$id];
        }else {
            return $data;
        }
    }
    public static function getStatus2 ($id=null)
    {
        $data = [
            '0'=>\Yii::t('yii','No Active'),
            '1'=>\Yii::t('yii','Active'),
            '2'=>\Yii::t('yii','Move to Trash')
        ];
        if (is_numeric($id)) {
            return $data[$id];
        }else {
            return $data;
        }
    }
    public static function getStatus3 ($id=null)
    {
        $data = [
            '0'=>\Yii::t('yii','Unapprove'),
            '1'=>\Yii::t('yii','Approve'),
            '2'=>\Yii::t('yii','Move to Trash'),
            '3'=>\Yii::t('yii','Mark as Spam'),
        ];
        if (is_numeric($id)) {
            return $data[$id];
        }else {
            return $data;
        }
    }
    public static function getStatus30 ($id=null)
    {
        $data = [
            '0'=>\Yii::t('yii','Pending'),
            '1'=>\Yii::t('yii','Approve'),
            '2'=>\Yii::t('yii','Trash'),
            '3'=>\Yii::t('yii','Spam'),
        ];
        if (is_numeric($id)) {
            return $data[$id];
        }else {
            return $data;
        }
    }
    public static function getStatus4 ($id=null)
    {
        $data = [
            '0'=>\Yii::t('yii','Pending'),
            '1'=>\Yii::t('yii','Publish'),
            '2'=>\Yii::t('yii','Move to Trash'),
        ];
        if (is_numeric($id)) {
            return $data[$id];
        }else {
            return $data;
        }
    }
    public static function getStatus5 ($id=null)
    {
        $data = [
            '0'=>\Yii::t('yii','Pending'),
            '1'=>\Yii::t('yii','Publish'),
            '2'=>\Yii::t('yii','In Trash'),
        ];
        if (is_numeric($id)) {
            return $data[$id];
        }else {
            return $data;
        }
    }
    public static function getStatus6 ($id=null, $check=null)
    {
        $data = [
            '0'=>\Yii::t('yii','No Active'),
            '1'=>\Yii::t('yii','Active'),
            '2'=>\Yii::t('yii','Unconfirmed Email'),
            '3'=>\Yii::t('yii','Delete'),
        ];
        if (is_numeric($id)) {
            return $data[$id];
        }else {
            if($check){
                unset($data['3']);
            }
            return $data;
        }
    }
    public static function clearEmpty($array)
    {
        $ar = [];
        foreach ($array as $key =>$item) {
            if ($item==null or empty($item) or $item=='') {
                unset($array[$key]);
            }else{
                $ar[] = $item;
            }
        }
        return $ar;
    }
    public static function clearEmptyString($str)
    {
        if (($str==null or empty($str) or $str=='') and !is_numeric($str)) {
            return false;
        }else{
            return true;
        }
    }
    public static function jsonEncode($value){
        return  json_encode( $value,JSON_UNESCAPED_UNICODE);
    }
    public static function jsonDecode($value,$current_language=null,$hard=null){
        if ($current_language) {
            $array = (array)json_decode($value);
            if ($hard) {
                if (isset($array[$current_language]) and $array[$current_language]!="") {
                    return $array[$current_language];
                }else{
                    $lang =  array_values($array);
                    $lang = DefaultController::clearEmpty($lang);
                    return (isset($lang[0]) and !empty($lang[0]))?$lang[0]:null;
                }
            }else {
                if (isset($array[$current_language])) {
                    return (!empty($array[$current_language])) ? $array[$current_language] : '<em class="text-danger">' . \Yii::t('yii', 'Not set') . '</em> - ' . $current_language;
                } else {
                    $lang = array_values($array);
                    $lang = DefaultController::clearEmpty($lang);
                    return (isset($lang[0]) and !empty($lang[0]))?$lang[0]:null;
                }
            }
        }
        return  (array)json_decode($value);
    }
    public static function jsonDecodeArray($array,$not=null){
        $current_language = \Yii::$app->language;
        $data = [];
        foreach ($array as $key=>$item) {
            if ($not) {
                if (is_array($item)) {
                    $array_data_key = (array)json_decode($key);
                    if (isset($array_data_key[$current_language]) and $array_data_key[$current_language]!="") {
                        $data[$array_data_key[$current_language]] = $item;
                    } else {
                        $lang = array_values($array_data_key);
                        $lang = DefaultController::clearEmpty($lang);
                        $data[$lang[0]] = $item;
                    }
                }else {
                    $array_data = (array)json_decode($item);
                    if (isset($array_data[$current_language])) {
                        $data[$key] = (!empty($array_data[$current_language])) ? $array_data[$current_language] : DefaultController::clearEmpty($array_data)[0];
                    } else {
                        $lang = array_values($array_data);
                        $lang = DefaultController::clearEmpty($lang);
                        $data[$key] = $lang[0];
                    }
                }
            }else{
                if (is_array($item)) {
                    $array_data_key = (array)json_decode($key);
                    if (isset($array_data_key[$current_language])) {
                        $data[$array_data_key[$current_language]] = $item;
                    } else {
                        $lang = array_values($array_data_key);
                        $lang = DefaultController::clearEmpty($lang);
                        $data[$lang[0]] = $item;
                    }
                }else {
                    $data[$key] = DefaultController::jsonDecode($item, $current_language);
                }
            }
        }
        return  $data;
    }
    public static function getFlag($code,$width=25,$height=17)
    {
        if (file_exists(\Yii::$app->basePath.'/web/media/flags/'.$code.'.gif')) {
           return '<img class="img-responsive"  style=" display: inline-block; width:'.$width.'px; height:'.$height.'px;"  src="'.\Yii::getAlias('@web_site').'/media/flags/'.$code.'.gif"> ';
        }else{
           return '<img class="img-responsive"  style=" display: inline-block;width:'.$width.'px; height:'.$height.'px;"    src="'.\Yii::getAlias('@web_site').'/media/flags/xx.gif"> ';
        }
    }
    public static function getAvatar($name,$style=null)
    {
        $name_path = str_replace(\Yii::getAlias('@web_site'),\Yii::$app->basePath.'/web/',$name);
        if (!empty($name) and $name!='' and file_exists($name_path)) {
           return '<img  class="img-responsive" alt="'.$name.'"   style="'.$style.'"   src="'.$name.'"> ';
        }else{
            return '<img  class="img-responsive" alt="'.$name.'"   style="'.$style.'"   src="'.\Yii::getAlias('@web_site').'/media/default_avatar.png"> ';
        }
    }
    public static function getImage($name,$style=null,$thumb=null, $params="", $cssClass="")
    {
        if($cssClass == ""){
            $cssClass = 'img-responsive';
        }

        if (!$thumb) {
            $name_path = str_replace(\Yii::getAlias('@web_site'),\Yii::$app->basePath.'/web/',$name);
            if (!empty($name) and $name!='' and file_exists($name_path)) {
                return '<img '.$params.' class="'.$cssClass.'" style="'.$style.'"   src="'.$name.'"> ';
            }else{
                return '<img '.$params.' class="'.$cssClass.'" style="'.$style.'"   src="'.\Yii::getAlias('@web_site').'/media/default_image.png" >';
            }
        }else{
            $name = str_replace('source','thumbs',$name);
            $name_path = str_replace(\Yii::getAlias('@web_site'),\Yii::$app->basePath.'/web/',$name);

            if (!empty($name) and $name!='' and file_exists($name_path)) {
                return '<img '.$params.' class="'.$cssClass.'" style="'.$style.'"   src="'.$name.'"> ';
            }else{
                return '<img '.$params.' class="'.$cssClass.'" style="'.$style.'"   src="'.\Yii::getAlias('@web_site').'/media/default_image.png" >';
            }
        }

    }
    public static function getBanner($name,$style=null,$thumb=null)
    {

        if (!$thumb) {
            $name_path = str_replace(\Yii::getAlias('@web_site'),\Yii::$app->basePath.'/web/',$name);
            if (!empty($name) and $name!='' and file_exists($name_path)) {
                return '<img  class="img-responsive"    style="width:100%; '.$style.'"   src="'.$name.'"> ';
            }else{
                return '<img  class="img-responsive"   style="width:100%; '.$style.'"   src="'.\Yii::getAlias('@web_site').'/media/banner.png" >';
            }
        }else{

            $name = str_replace('source','thumbs',$name);

            $name_path = str_replace(\Yii::getAlias('@web_site'),\Yii::$app->basePath.'/web/',$name);
            if (!empty($name) and $name!='' and file_exists($name_path)) {
                return '<img  class="img-responsive"    style="'.$style.'"   src="'.$name.'"> ';
            }else{
                return '<img  class="img-responsive"   style="'.$style.'"   src="'.\Yii::getAlias('@web_site').'/media/banner.png" >';
            }
        }

    }
    public static function getThumb($file){

        $name = str_replace('source','thumbs',$file);
        $name_path = str_replace(\Yii::getAlias('@web_site'),\Yii::$app->basePath.'/web/',$name);
        if (!empty($name) and $name!='' and file_exists($name_path)) {
            return $name;
        }else{
            return \Yii::getAlias('@web_site').'/media/default_image.png';
        }
    }
    public static function getTimeZone($location=null,$item=null){
        
        $data =  [
            'Africa'=>[
                "Africa/Abidjan"=>"Abidjan",
                "Africa/Accra"=>"Accra",
                "Africa/Addis_Ababa"=>"Addis Ababa",
                "Africa/Algiers"=>"Algiers",
                "Africa/Asmara"=>"Asmara",
                "Africa/Bamako"=>"Bamako",
                "Africa/Bangui"=>"Bangui",
                "Africa/Banjul"=>"Banjul",
                "Africa/Bissau"=>"Bissau",
                "Africa/Blantyre"=>"Blantyre",
                "Africa/Brazzaville"=>"Brazzaville",
                "Africa/Bujumbura"=>"Bujumbura",
                "Africa/Cairo"=>"Cairo",
                "Africa/Casablanca"=>"Casablanca",
                "Africa/Ceuta"=>"Ceuta",
                "Africa/Conakry"=>"Conakry",
                "Africa/Dakar"=>"Dakar",
                "Africa/Dar_es_Salaam"=>"Dar es Salaam",
                "Africa/Djibouti"=>"Djibouti",
                "Africa/Douala"=>"Douala",
                "Africa/El_Aaiun"=>"El Aaiun",
                "Africa/Freetown"=>"Freetown",
                "Africa/Gaborone"=>"Gaborone",
                "Africa/Harare"=>"Harare",
                "Africa/Johannesburg"=>"Johannesburg",
                "Africa/Juba"=>"Juba",
                "Africa/Kampala"=>"Kampala",
                "Africa/Khartoum"=>"Khartoum",
                "Africa/Kigali"=>"Kigali",
                "Africa/Kinshasa"=>"Kinshasa",
                "Africa/Lagos"=>"Lagos",
                "Africa/Libreville"=>"Libreville",
                "Africa/Lome"=>"Lome",
                "Africa/Luanda"=>"Luanda",
                "Africa/Lubumbashi"=>"Lubumbashi",
                "Africa/Lusaka"=>"Lusaka",
                "Africa/Malabo"=>"Malabo",
                "Africa/Maputo"=>"Maputo",
                "Africa/Maseru"=>"Maseru",
                "Africa/Mbabane"=>"Mbabane",
                "Africa/Mogadishu"=>"Mogadishu",
                "Africa/Monrovia"=>"Monrovia",
                "Africa/Nairobi"=>"Nairobi",
                "Africa/Ndjamena"=>"Ndjamena",
                "Africa/Niamey"=>"Niamey",
                "Africa/Nouakchott"=>"Nouakchott",
                "Africa/Ouagadougou"=>"Ouagadougou",
                "Africa/Porto-Novo"=>"Porto-Novo",
                "Africa/Sao_Tome"=>"Sao Tome",
                "Africa/Tripoli"=>"Tripoli",
                "Africa/Tunis"=>"Tunis",
                "Africa/Windhoek"=>"Windhoek",
            ],
            'America'=>[
                "America/Adak"=>"Adak",
                "America/Anchorage"=>"Anchorage",
                "America/Anguilla"=>"Anguilla",
                "America/Antigua"=>"Antigua",
                "America/Araguaina"=>"Araguaina",
                "America/Argentina/Buenos_Aires"=>"Argentina - Buenos Aires",
                "America/Argentina/Catamarca"=>"Argentina - Catamarca",
                "America/Argentina/Cordoba"=>"Argentina - Cordoba",
                "America/Argentina/Jujuy"=>"Argentina - Jujuy",
                "America/Argentina/La_Rioja"=>"Argentina - La Rioja",
                "America/Argentina/Mendoza"=>"Argentina - Mendoza",
                "America/Argentina/Rio_Gallegos"=>"Argentina - Rio Gallegos",
                "America/Argentina/Salta"=>"Argentina - Salta",
                "America/Argentina/San_Juan"=>"Argentina - San Juan",
                "America/Argentina/San_Luis"=>"Argentina - San Luis",
                "America/Argentina/Tucuman"=>"Argentina - Tucuman",
                "America/Argentina/Ushuaia"=>"Argentina - Ushuaia",
                "America/Aruba"=>"Aruba",
                "America/Asuncion"=>"Asuncion",
                "America/Atikokan"=>"Atikokan",
                "America/Bahia"=>"Bahia",
                "America/Bahia_Banderas"=>"Bahia Banderas",
                "America/Barbados"=>"Barbados",
                "America/Belem"=>"Belem",
                "America/Belize"=>"Belize",
                "America/Blanc-Sablon"=>"Blanc-Sablon",
                "America/Boa_Vista"=>"Boa Vista",
                "America/Bogota"=>"Bogota",
                "America/Boise"=>"Boise",
                "America/Cambridge_Bay"=>"Cambridge Bay",
                "America/Campo_Grande"=>"Campo Grande",
                "America/Cancun"=>"Cancun",
                "America/Caracas"=>"Caracas",
                "America/Cayenne"=>"Cayenne",
                "America/Cayman"=>"Cayman",
                "America/Chicago"=>"Chicago",
                "America/Chihuahua"=>"Chihuahua",
                "America/Costa_Rica"=>"Costa Rica",
                "America/Creston"=>"Creston",
                "America/Cuiaba"=>"Cuiaba",
                "America/Curacao"=>"Curacao",
                "America/Danmarkshavn"=>"Danmarkshavn",
                "America/Dawson"=>"Dawson",
                "America/Dawson_Creek"=>"Dawson Creek",
                "America/Denver"=>"Denver",
                "America/Detroit"=>"Detroit",
                "America/Dominica"=>"Dominica",
                "America/Edmonton"=>"Edmonton",
                "America/Eirunepe"=>"Eirunepe",
                "America/El_Salvador"=>"El Salvador",
                "America/Fortaleza"=>"Fortaleza",
                "America/Glace_Bay"=>"Glace Bay",
                "America/Godthab"=>"Godthab",
                "America/Goose_Bay"=>"Goose Bay",
                "America/Grand_Turk"=>"Grand Turk",
                "America/Grenada"=>"Grenada",
                "America/Guadeloupe"=>"Guadeloupe",
                "America/Guatemala"=>"Guatemala",
                "America/Guayaquil"=>"Guayaquil",
                "America/Guyana"=>"Guyana",
                "America/Halifax"=>"Halifax",
                "America/Havana"=>"Havana",
                "America/Hermosillo"=>"Hermosillo",
                "America/Indiana/Indianapolis"=>"Indiana - Indianapolis",
                "America/Indiana/Knox"=>"Indiana - Knox",
                "America/Indiana/Marengo"=>"Indiana - Marengo",
                "America/Indiana/Petersburg"=>"Indiana - Petersburg",
                "America/Indiana/Tell_City"=>"Indiana - Tell City",
                "America/Indiana/Vevay"=>"Indiana - Vevay",
                "America/Indiana/Vincennes"=>"Indiana - Vincennes",
                "America/Indiana/Winamac"=>"Indiana - Winamac",
                "America/Inuvik"=>"Inuvik",
                "America/Iqaluit"=>"Iqaluit",
                "America/Jamaica"=>"Jamaica",
                "America/Juneau"=>"Juneau",
                "America/Kentucky/Louisville"=>"Kentucky - Louisville",
                "America/Kentucky/Monticello"=>"Kentucky - Monticello",
                "America/Kralendijk"=>"Kralendijk",
                "America/La_Paz"=>"La Paz",
                "America/Lima"=>"Lima",
                "America/Los_Angeles"=>"Los Angeles",
                "America/Lower_Princes"=>"Lower Princes",
                "America/Maceio"=>"Maceio",
                "America/Managua"=>"Managua",
                "America/Manaus"=>"Manaus",
                "America/Marigot"=>"Marigot",
                "America/Martinique"=>"Martinique",
                "America/Matamoros"=>"Matamoros",
                "America/Mazatlan"=>"Mazatlan",
                "America/Menominee"=>"Menominee",
                "America/Merida"=>"Merida",
                "America/Metlakatla"=>"Metlakatla",
                "America/Mexico_City"=>"Mexico City",
                "America/Miquelon"=>"Miquelon",
                "America/Moncton"=>"Moncton",
                "America/Monterrey"=>"Monterrey",
                "America/Montevideo"=>"Montevideo",
                "America/Montserrat"=>"Montserrat",
                "America/Nassau"=>"Nassau",
                "America/New_York"=>"New York",
                "America/Nipigon"=>"Nipigon",
                "America/Nome"=>"Nome",
                "America/Noronha"=>"Noronha",
                "America/North_Dakota/Beulah"=>"North Dakota - Beulah",
                "America/North_Dakota/Center"=>"North Dakota - Center",
                "America/North_Dakota/New_Salem"=>"North Dakota - New Salem",
                "America/Ojinaga"=>"Ojinaga",
                "America/Panama"=>"Panama",
                "America/Pangnirtung"=>"Pangnirtung",
                "America/Paramaribo"=>"Paramaribo",
                "America/Phoenix"=>"Phoenix",
                "America/Port-au-Prince"=>"Port-au-Prince",
                "America/Port_of_Spain"=>"Port of Spain",
                "America/Porto_Velho"=>"Porto Velho",
                "America/Puerto_Rico"=>"Puerto Rico",
                "America/Rainy_River"=>"Rainy River",
                "America/Rankin_Inlet"=>"Rankin Inlet",
                "America/Recife"=>"Recife",
                "America/Regina"=>"Regina",
                "America/Resolute"=>"Resolute",
                "America/Rio_Branco"=>"Rio Branco",
                "America/Santa_Isabel"=>"Santa Isabel",
                "America/Santarem"=>"Santarem",
                "America/Santiago"=>"Santiago",
                "America/Santo_Domingo"=>"Santo Domingo",
                "America/Sao_Paulo"=>"Sao Paulo",
                "America/Scoresbysund"=>"Scoresbysund",
                "America/Sitka"=>"Sitka",
                "America/St_Barthelemy"=>"St Barthelemy",
                "America/St_Johns"=>"St Johns",
                "America/St_Kitts"=>"St Kitts",
                "America/St_Lucia"=>"St Lucia",
                "America/St_Thomas"=>"St Thomas",
                "America/St_Vincent"=>"St Vincent",
                "America/Swift_Current"=>"Swift Current",
                "America/Tegucigalpa"=>"Tegucigalpa",
                "America/Thule"=>"Thule",
                "America/Thunder_Bay"=>"Thunder Bay",
                "America/Tijuana"=>"Tijuana",
                "America/Toronto"=>"Toronto",
                "America/Tortola"=>"Tortola",
                "America/Vancouver"=>"Vancouver",
                "America/Whitehorse"=>"Whitehorse",
                "America/Winnipeg"=>"Winnipeg",
                "America/Yakutat"=>"Yakutat",
                "America/Yellowknife"=>"Yellowknife",
            ],
            'Antarctica'=>[
                "Antarctica/Casey"=>"Casey",
                "Antarctica/Davis"=>"Davis",
                "Antarctica/DumontDUrville"=>"DumontDUrville",
                "Antarctica/Macquarie"=>"Macquarie",
                "Antarctica/Mawson"=>"Mawson",
                "Antarctica/McMurdo"=>"McMurdo",
                "Antarctica/Palmer"=>"Palmer",
                "Antarctica/Rothera"=>"Rothera",
                "Antarctica/Syowa"=>"Syowa",
                "Antarctica/Troll"=>"Troll",
                "Antarctica/Vostok"=>"Vostok",
            ],
            'Arctic'=>[
                "Arctic/Longyearbyen"=>"Longyearbyen",
            ],
            'Asia'=>[
                "Asia/Aden"=>"Aden",
                "Asia/Almaty"=>"Almaty",
                "Asia/Amman"=>"Amman",
                "Asia/Anadyr"=>"Anadyr",
                "Asia/Aqtau"=>"Aqtau",
                "Asia/Aqtobe"=>"Aqtobe",
                "Asia/Ashgabat"=>"Ashgabat",
                "Asia/Baghdad"=>"Baghdad",
                "Asia/Bahrain"=>"Bahrain",
                "Asia/Baku"=>"Baku",
                "Asia/Bangkok"=>"Bangkok",
                "Asia/Beirut"=>"Beirut",
                "Asia/Bishkek"=>"Bishkek",
                "Asia/Brunei"=>"Brunei",
                "Asia/Chita"=>"Chita",
                "Asia/Choibalsan"=>"Choibalsan",
                "Asia/Colombo"=>"Colombo",
                "Asia/Damascus"=>"Damascus",
                "Asia/Dhaka"=>"Dhaka",
                "Asia/Dili"=>"Dili",
                "Asia/Dubai"=>"Dubai",
                "Asia/Dushanbe"=>"Dushanbe",
                "Asia/Gaza"=>"Gaza",
                "Asia/Hebron"=>"Hebron",
                "Asia/Ho_Chi_Minh"=>"Ho Chi Minh",
                "Asia/Hong_Kong"=>"Hong Kong",
                "Asia/Hovd"=>"Hovd",
                "Asia/Irkutsk"=>"Irkutsk",
                "Asia/Jakarta"=>"Jakarta",
                "Asia/Jayapura"=>"Jayapura",
                "Asia/Jerusalem"=>"Jerusalem",
                "Asia/Kabul"=>"Kabul",
                "Asia/Kamchatka"=>"Kamchatka",
                "Asia/Karachi"=>"Karachi",
                "Asia/Kathmandu"=>"Kathmandu",
                "Asia/Khandyga"=>"Khandyga",
                "Asia/Kolkata"=>"Kolkata",
                "Asia/Krasnoyarsk"=>"Krasnoyarsk",
                "Asia/Kuala_Lumpur"=>"Kuala Lumpur",
                "Asia/Kuching"=>"Kuching",
                "Asia/Kuwait"=>"Kuwait",
                "Asia/Macau"=>"Macau",
                "Asia/Magadan"=>"Magadan",
                "Asia/Makassar"=>"Makassar",
                "Asia/Manila"=>"Manila",
                "Asia/Muscat"=>"Muscat",
                "Asia/Nicosia"=>"Nicosia",
                "Asia/Novokuznetsk"=>"Novokuznetsk",
                "Asia/Novosibirsk"=>"Novosibirsk",
                "Asia/Omsk"=>"Omsk",
                "Asia/Oral"=>"Oral",
                "Asia/Phnom_Penh"=>"Phnom Penh",
                "Asia/Pontianak"=>"Pontianak",
                "Asia/Pyongyang"=>"Pyongyang",
                "Asia/Qatar"=>"Qatar",
                "Asia/Qyzylorda"=>"Qyzylorda",
                "Asia/Rangoon"=>"Rangoon",
                "Asia/Riyadh"=>"Riyadh",
                "Asia/Sakhalin"=>"Sakhalin",
                "Asia/Samarkand"=>"Samarkand",
                "Asia/Seoul"=>"Seoul",
                "Asia/Shanghai"=>"Shanghai",
                "Asia/Singapore"=>"Singapore",
                "Asia/Srednekolymsk"=>"Srednekolymsk",
                "Asia/Taipei"=>"Taipei",
                "Asia/Tashkent"=>"Tashkent",
                "Asia/Tbilisi"=>"Tbilisi",
                "Asia/Tehran"=>"Tehran",
                "Asia/Thimphu"=>"Thimphu",
                "Asia/Tokyo"=>"Tokyo",
                "Asia/Ulaanbaatar"=>"Ulaanbaatar",
                "Asia/Urumqi"=>"Urumqi",
                "Asia/Ust-Nera"=>"Ust-Nera",
                "Asia/Vientiane"=>"Vientiane",
                "Asia/Vladivostok"=>"Vladivostok",
                "Asia/Yakutsk"=>"Yakutsk",
                "Asia/Yekaterinburg"=>"Yekaterinburg",
                "Asia/Yerevan"=>"Yerevan",
            ],
            'Atlantic'=>[
                "Atlantic/Azores"=>"Azores",
                "Atlantic/Bermuda"=>"Bermuda",
                "Atlantic/Canary"=>"Canary",
                "Atlantic/Cape_Verde"=>"Cape Verde",
                "Atlantic/Faroe"=>"Faroe",
                "Atlantic/Madeira"=>"Madeira",
                "Atlantic/Reykjavik"=>"Reykjavik",
                "Atlantic/South_Georgia"=>"South Georgia",
                "Atlantic/Stanley"=>"Stanley",
                "Atlantic/St_Helena"=>"St Helena",
            ],
            'Australia'=>[
                "Australia/Adelaide"=>"Adelaide",
                "Australia/Brisbane"=>"Brisbane",
                "Australia/Broken_Hill"=>"Broken Hill",
                "Australia/Currie"=>"Currie",
                "Australia/Darwin"=>"Darwin",
                "Australia/Eucla"=>"Eucla",
                "Australia/Hobart"=>"Hobart",
                "Australia/Lindeman"=>"Lindeman",
                "Australia/Lord_Howe"=>"Lord Howe",
                "Australia/Melbourne"=>"Melbourne",
                "Australia/Perth"=>"Perth",
                "Australia/Sydney"=>"Sydney",
            ],
            'Europe'=>[
                "Europe/Amsterdam"=>"Amsterdam",
                "Europe/Andorra"=>"Andorra",
                "Europe/Athens"=>"Athens",
                "Europe/Belgrade"=>"Belgrade",
                "Europe/Berlin"=>"Berlin",
                "Europe/Bratislava"=>"Bratislava",
                "Europe/Brussels"=>"Brussels",
                "Europe/Bucharest"=>"Bucharest",
                "Europe/Budapest"=>"Budapest",
                "Europe/Busingen"=>"Busingen",
                "Europe/Chisinau"=>"Chisinau",
                "Europe/Copenhagen"=>"Copenhagen",
                "Europe/Dublin"=>"Dublin",
                "Europe/Gibraltar"=>"Gibraltar",
                "Europe/Guernsey"=>"Guernsey",
                "Europe/Helsinki"=>"Helsinki",
                "Europe/Isle_of_Man"=>"Isle of Man",
                "Europe/Istanbul"=>"Istanbul",
                "Europe/Jersey"=>"Jersey",
                "Europe/Kaliningrad"=>"Kaliningrad",
                "Europe/Kiev"=>"Kiev",
                "Europe/Lisbon"=>"Lisbon",
                "Europe/Ljubljana"=>"Ljubljana",
                "Europe/London"=>"London",
                "Europe/Luxembourg"=>"Luxembourg",
                "Europe/Madrid"=>"Madrid",
                "Europe/Malta"=>"Malta",
                "Europe/Mariehamn"=>"Mariehamn",
                "Europe/Minsk"=>"Minsk",
                "Europe/Monaco"=>"Monaco",
                "Europe/Moscow"=>"Moscow",
                "Europe/Oslo"=>"Oslo",
                "Europe/Paris"=>"Paris",
                "Europe/Podgorica"=>"Podgorica",
                "Europe/Prague"=>"Prague",
                "Europe/Riga"=>"Riga",
                "Europe/Rome"=>"Rome",
                "Europe/Samara"=>"Samara",
                "Europe/San_Marino"=>"San Marino",
                "Europe/Sarajevo"=>"Sarajevo",
                "Europe/Simferopol"=>"Simferopol",
                "Europe/Skopje"=>"Skopje",
                "Europe/Sofia"=>"Sofia",
                "Europe/Stockholm"=>"Stockholm",
                "Europe/Tallinn"=>"Tallinn",
                "Europe/Tirane"=>"Tirane",
                "Europe/Uzhgorod"=>"Uzhgorod",
                "Europe/Vaduz"=>"Vaduz",
                "Europe/Vatican"=>"Vatican",
                "Europe/Vienna"=>"Vienna",
                "Europe/Vilnius"=>"Vilnius",
                "Europe/Volgograd"=>"Volgograd",
                "Europe/Warsaw"=>"Warsaw",
                "Europe/Zagreb"=>"Zagreb",
                "Europe/Zaporozhye"=>"Zaporozhye",
                "Europe/Zurich"=>"Zurich",
            ],
            'Indian'=>[
                "Indian/Antananarivo"=>"Antananarivo",
                "Indian/Chagos"=>"Chagos",
                "Indian/Christmas"=>"Christmas",
                "Indian/Cocos"=>"Cocos",
                "Indian/Comoro"=>"Comoro",
                "Indian/Kerguelen"=>"Kerguelen",
                "Indian/Mahe"=>"Mahe",
                "Indian/Maldives"=>"Maldives",
                "Indian/Mauritius"=>"Mauritius",
                "Indian/Mayotte"=>"Mayotte",
                "Indian/Reunion"=>"Reunion",
            ],
            'Pacific'=>[
                "Pacific/Apia"=>"Apia",
                "Pacific/Auckland"=>"Auckland",
                "Pacific/Bougainville"=>"Bougainville",
                "Pacific/Chatham"=>"Chatham",
                "Pacific/Chuuk"=>"Chuuk",
                "Pacific/Easter"=>"Easter",
                "Pacific/Efate"=>"Efate",
                "Pacific/Enderbury"=>"Enderbury",
                "Pacific/Fakaofo"=>"Fakaofo",
                "Pacific/Fiji"=>"Fiji",
                "Pacific/Funafuti"=>"Funafuti",
                "Pacific/Galapagos"=>"Galapagos",
                "Pacific/Gambier"=>"Gambier",
                "Pacific/Guadalcanal"=>"Guadalcanal",
                "Pacific/Guam"=>"Guam",
                "Pacific/Honolulu"=>"Honolulu",
                "Pacific/Johnston"=>"Johnston",
                "Pacific/Kiritimati"=>"Kiritimati",
                "Pacific/Kosrae"=>"Kosrae",
                "Pacific/Kwajalein"=>"Kwajalein",
                "Pacific/Majuro"=>"Majuro",
                "Pacific/Marquesas"=>"Marquesas",
                "Pacific/Midway"=>"Midway",
                "Pacific/Nauru"=>"Nauru",
                "Pacific/Niue"=>"Niue",
                "Pacific/Norfolk"=>"Norfolk",
                "Pacific/Noumea"=>"Noumea",
                "Pacific/Pago_Pago"=>"Pago Pago",
                "Pacific/Palau"=>"Palau",
                "Pacific/Pitcairn"=>"Pitcairn",
                "Pacific/Pohnpei"=>"Pohnpei",
                "Pacific/Port_Moresby"=>"Port Moresby",
                "Pacific/Rarotonga"=>"Rarotonga",
                "Pacific/Saipan"=>"Saipan",
                "Pacific/Tahiti"=>"Tahiti",
                "Pacific/Tarawa"=>"Tarawa",
                "Pacific/Tongatapu"=>"Tongatapu",
                "Pacific/Wake"=>"Wake",
                "Pacific/Wallis"=>"Wallis",
            ],
            'UTC'=>[
                "UTC"=>"UTC",
            ],
        ];
        if ($location and $item and isset($data[$location][$item])) {
            return $data[$location][$item];
        }else{
            return $data;
        }
    }
    public static function getDate($date,$time=null)
    {
        $site_date = \common\models\Option::find()->where(['name'=>'site_date'])->one();
        if ($site_date!=null) {
            if ($time) {
                return date($site_date->value.' | H:i',strtotime($date));
            }else{
                return date($site_date->value,strtotime($date));
            }
        }
    }
    public function homePage(){
        if(Yii::$app->controller->id=='site' and Yii::$app->controller->action->id=='index' ){
            return true;
        }else{
            return false;
        }
    }
}
