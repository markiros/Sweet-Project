<?php

class CatalogController extends Controller
{
    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    public function actionList()
    {
        $this->render('list');
    }

    public function actionInsert()
    {
        $cars = Category::model()->findByPk(1);
        $node = Category::model()->findByPk(2);
        $node->moveAsFirst($cars);
    }

    public function actionIndex()
    {
        $categories = Category::model()->findAll(array('order'=>'lft'));
        //$categories = Category::model()->findAll(array('order'=>'lft'));
        $root_id = 1;
        $categories = Category::model()->findAll(array(
            'condition'=>'root=:root_id',
            'order'=>'lft',
            'params'=>array(':root_id'=>$root_id),
        ));

        //$category = Category::model()->findByPk(1);
        //$categories = $category->descendants()->findAll();

        /*
        $fruits = Category::model()->findByPk(1);
        $audi = Category::model()->findByPk(9);
        $audi->moveAsFirst($fruits);
        */
        /*
        $category1 = new Category;
        $category1->title = 'Ford';
        $category2 = new Category;
        $category2->title = 'Mercedes';
        $category3 = new Category;
        $category3->title = 'Audi';
        $root = Category::model()->findByPk(3);
        $category1->appendTo($root);
        $category2->insertAfter($category1);
        $category3->insertBefore($category1);
        */

        $dataProvider = new CActiveDataProvider('Product');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
            'categories' => $categories,
        ));
    }

    public function actionView()
    {
        $this->render('view',array(
            'model'=>$this->loadModel(),
        ));
    }

    public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
                $this->_model=Product::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }

    public function actionImport()
    {
        $dirname = realpath('./!/').DIRECTORY_SEPARATOR;
        $targetDirname = realpath('./!!/').DIRECTORY_SEPARATOR;

        $products = Product::model()->findAll();

        foreach ($products as $p) {
            $filepath = iconv('utf-8', 'cp1251', $dirname.$p->image_url);
            //print $filepath.'<br/>';
            if (file_exists($filepath)) {
                $content = file_get_contents($filepath);
                print strlen($content).'<br/>';
                $filename = sha1(rand(100,10000)*microtime(true));
                $ext = 'jpg';

                $targetFilepath = $targetDirname.$filename.'.'.$ext;
                //file_put_contents($targetFilepath, $content);

                //$p->title = $filename.'.'.$ext;
                //$p->save();
                //print $p->image_url.'<br/>';
            }
        }
    }

    // -----------------------------------------------------------
    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}
