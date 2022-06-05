<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form of `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPersona', 'documento', 'celular', 'TipoDocumento', 'genero'], 'integer'],
            [['nombre', 'apellido', 'correo', 'fechaNacimiento', 'direccion', 'ciudad', 'foto', 'contrasena'], 'safe'],
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
        $query = Persona::find();

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
            'idPersona' => $this->idPersona,
            'documento' => $this->documento,
            'celular' => $this->celular,
            'TipoDocumento' => $this->TipoDocumento,
            'genero' => $this->genero,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'fechaNacimiento', $this->fechaNacimiento])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'contrasena', $this->contrasena]);

        return $dataProvider;
    }
}
