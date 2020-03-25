<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VcsRecord;

/**
 * VscRecordSearch represents the model behind the search form of `app\models\VscRecord`.
 */
class VcsRecordSearch extends VcsRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'revision', 'rs', 'ticket', 'server', 'jenkins_status', 'next_revision'], 'integer'],
            [['author', 'message', 'comment', 'create_time', 'update_time', 'delete_time'], 'safe'],
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
        $query = VcsRecord::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'revision' => $this->revision,
            'rs' => $this->rs,
            'ticket' => $this->ticket,
            'server' => $this->server,
            'jenkins_status' => $this->jenkins_status,
            'next_revision' => $this->next_revision,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'delete_time' => $this->delete_time,
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
