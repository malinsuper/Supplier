<?php

namespace app\models;

use app\helpers\FileHelper;
use app\models\Supplier;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SupplierSearch represents the model behind the search form of `app\models\Supplier`.
 */
class SupplierSearch extends Supplier
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'safe'],
            [['name', 'code', 't_status'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = Supplier::find();

        $this->load($params);

        // grid filtering conditions

        if (!empty($params['ids'])) {

            $ids = explode(',', $params['ids']);

            foreach($ids as &$val){
                $val = intval($val);
            }

            $query->andFilterWhere(['id' => $ids]);
        } else {
            if (!empty($this->id)) {

                $id = $this->id;

                if (!is_numeric($id) && strlen($id)>1) {

                    $operateStr = substr($id, 0, 2);

                    if (in_array($operateStr,['>=','<='])) {
                        $query->andFilterWhere([$operateStr, 'id' , intval(str_replace($operateStr,'',$id))]);
                    } else {

                        $operateStr = substr($id, 0, 1);

                        if (in_array($operateStr,['>','<'])) {
                            $query->andFilterWhere([$operateStr, 'id' , intval(str_replace($operateStr,'',$id))]);
                        }
                    }

                } else {
                    $id = intval($id);
                    $query->andFilterWhere(['id' => $id]);
                }
            }
        }

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'code', $this->code])
              ->andFilterWhere(['t_status' => $this->t_status]);

        // if is export
        if (!empty($params['is_export'])) {
            $this->export($params, $query);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function export($params, $query){

        $fileName = 'Supplier-'.date('YmdHis').'.csv';

        $header = Supplier::attributeLabels();

        $orderBy = ['id' => SORT_ASC];

        if (!empty($params['sort'])) {

            $orderByKey = trim($params['sort'],'-');
            $orderByVal = $params['sort'][0]=='-' ? SORT_DESC : SORT_ASC;

            if(isset($header[$orderByKey])){
                $orderBy = [$orderByKey => $orderByVal];
            }

        }

        $data = $query->orderBy($orderBy)->asArray()->all();

        FileHelper::exportCsvFile($fileName, $header, $data);
    }
}
