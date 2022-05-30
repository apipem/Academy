<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $idPersona
 * @property string $nombre
 * @property string $apellido
 * @property int $documento
 * @property int $celular
 * @property string $correo
 * @property string $fechaNacimiento
 * @property string $direccion
 * @property string $ciudad
 * @property string $foto
 * @property string $contrasena
 * @property int $TipoDocumento
 * @property int $genero
 *
 * @property Estudiante[] $estudiantes
 * @property Estudiante[] $estudiantes0
 * @property Funcionario[] $funcionarios
 * @property Genero $genero0
 * @property TipoDocumento $tipoDocumento
 */
class Persona extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'documento', 'celular', 'correo', 'fechaNacimiento', 'direccion', 'ciudad', 'foto', 'contrasena', 'TipoDocumento', 'genero'], 'required'],
            [['documento', 'celular', 'TipoDocumento', 'genero'], 'integer'],
            [['correo', 'direccion', 'foto', 'contrasena'], 'string'],
            [['fechaNacimiento'], 'safe'],
            [['nombre', 'apellido'], 'string', 'max' => 100],
            [['ciudad'], 'string', 'max' => 45],
            [['genero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['genero' => 'idGenero']],
            [['TipoDocumento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoDocumento::className(), 'targetAttribute' => ['TipoDocumento' => 'idTipo_Documento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersona' => 'Id Persona',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'documento' => 'Documento',
            'celular' => 'Celular',
            'correo' => 'Correo',
            'fechaNacimiento' => 'Fecha Nacimiento',
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
            'foto' => 'Foto',
            'contrasena' => 'Contrasena',
            'TipoDocumento' => 'Tipo Documento',
            'genero' => 'Genero',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['estudiante' => 'idPersona']);
    }

    /**
     * Gets query for [[Estudiantes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes0()
    {
        return $this->hasMany(Estudiante::className(), ['acudiente' => 'idPersona']);
    }

    /**
     * Gets query for [[Funcionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['Persona' => 'idPersona']);
    }

    /**
     * Gets query for [[Genero0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenero0()
    {
        return $this->hasOne(Genero::className(), ['idGenero' => 'genero']);
    }

    /**
     * Gets query for [[TipoDocumento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocumento()
    {
        return $this->hasOne(TipoDocumento::className(), ['idTipo_Documento' => 'TipoDocumento']);
    }
    //////////////////////Metodos para determinar si la persona es un funcionario o un aprendiz///////////////////
    public static function isFuncionario($id){
        if(Funcionario::findOne(['Persona' => $id])){
            return true;
        }
        return false;
    }

    public static function isEstudiante($id){
        if(Estudiante::findOne(['estudiante' => $id])){
            return true;
        }
        return false;
    }

    public static function isAdministrador(){
        if(self::findOne(['idPersona' => 1])){
            return true;
        }
        return false;
    }

    /////////////////////Encriptar password//////////////////
    public function beforeSave($insert)
    {
        if(isset($this->contrasena)){
            try {
                $this->contrasena = Yii::$app->security->generatePasswordHash($this->contrasena);
            } catch (Exception $e) {

            }
        }

        if ($this->isNewRecord) {
            $this->contrasena = Yii::$app->security->generatePasswordHash($this->contrasena);
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    /////////////////////////////////LOGiNNNNNNN////////////////////////////////

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne(['idPersona' => $id]);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['documento' => $username]);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->idPersona;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     * @throws NotSupportedException
     */
    public function getAuthKey()
    {
        return $this->contrasena;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     * @throws NotSupportedException
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    /**
     * @param $password
     * @return bool
     */
    public function validatePassword($password){
        try{
            if(Yii::$app->security->validatePassword($password, $this->contrasena)){
                return true;
            }
        }catch(InvalidArgumentException $ex){
            return false;
        }
        //####GENERAR CONTRASENA A USUARIO NUEVO
        //$this->contrasena = 12345;
        //$this->save(false))
        //return true;
    }

    /** @param $displayField
     * @throws \yii\base\InvalidConfigException
     */
    public function dfIsFK($displayField){
        $fkKeys = self::getTableSchema()->foreignKeys;
        foreach($fkKeys as $key){
            if($key[0] === $displayField){
                $props = self::attributes();
                foreach($props as $prop){
                    if(strpos($prop,$displayField) !== false){
                        return $prop.'0';
                    }
                }
            }
        }
        return null;
    }


    /**
     * @inheritdoc
     */
    public function getIdModel(){
        return 'idPersona';
    }

    /**
     * @inheritdoc
     */
    public function getDisplayField()
    {
        return 'nombre';
    }

    /**
     * @inheritdoc
     * @throws Exception
     */
    public function generatePasswordResetToken(){
        $this->password_reset_token = Yii::$app->security->generateRandomString().'_'.time();
    }

    /**
     * @inheritdoc
     */
    public function resetPasswordResetToken(){
        $this->password_reset_token = null;
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static null
     */
    public static function findByPasswordResetToken($token) {
        if (! static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token,
            'estado' => 'Activo'
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)){
            return false;
        }
        $expire = Yii::$app->params['passwordResetTokenExpire'];
        $parts = explode( '_', $token );
        $timestamp = (int)end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
