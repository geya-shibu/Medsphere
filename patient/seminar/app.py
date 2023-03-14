import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import mysql.connector

from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.linear_model import LogisticRegression
from sklearn.neighbors import KNeighborsClassifier
from sklearn.svm import SVC

from sklearn.tree import DecisionTreeClassifier
from sklearn.ensemble import RandomForestClassifier
from sklearn.ensemble import GradientBoostingClassifier
from sklearn.pipeline import Pipeline
from flask import Flask, redirect, url_for, render_template, request, jsonify
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="portal"
)

mycursor = mydb.cursor()

data = pd.read_csv('diabetes.csv')
data_copy = data.copy(deep=True)
data_copy[['Glucose', 'BloodPressure', 'SkinThickness', 'Insulin',
       'BMI']] = data_copy[['Glucose', 'BloodPressure', 'SkinThickness', 'Insulin',
       'BMI']].replace(0,np.nan)

data_copy.isnull().sum()

data['Glucose'] = data['Glucose'].replace(0,data['Glucose'].mean())
data['BloodPressure'] = data['BloodPressure'].replace(0,data['BloodPressure'].mean())
data['SkinThickness'] = data['SkinThickness'].replace(0,data['SkinThickness'].mean())
data['Insulin'] = data['Insulin'].replace(0,data['Insulin'].mean())
data['BMI'] = data['BMI'].replace(0,data['BMI'].mean())

X = data[['Glucose', 'BloodPressure', 'Insulin', 'BMI', 'Age']]
y = data['Outcome']

X_train,X_test,y_train,y_test=train_test_split(X,y,test_size=0.2,
                                               random_state=42)

pipeline_lr  = Pipeline([('scalar1',StandardScaler()),
                         ('lr_classifier',LogisticRegression())])

pipeline_svc = Pipeline([('scalar2',StandardScaler()),
                         ('svc_classifier',SVC())])

pipeline_rf = Pipeline([('rf_classifier',RandomForestClassifier(max_depth=3))])

pipelines = [pipeline_lr,
            pipeline_svc,
            pipeline_rf]

pipelines

for pipe in pipelines:
    pipe.fit(X_train,y_train)

pipe_dict = {0:'Logistic Regression',
             1:'Support Vector Classifier',
             2: 'Random Forest Classifier'}

pipe_dict

def randomforest(payload1, payload2, payload3, payload4, payload5, pid):
    
    from sklearn.ensemble import RandomForestClassifier

    X = data[['Glucose', 'BloodPressure', 'Insulin', 'BMI', 'Age']]
    y = data['Outcome']

    rf =RandomForestClassifier(max_depth=3)
    rf=rf.fit(X,y)
    
    new_data = pd.DataFrame({
        
        'Glucose':payload1,
        'BloodPressure':payload2,
        'Insulin':payload3,
        'BMI':payload4,
        'Age':payload5
            
    },index=[0])    

    p = rf.predict(new_data)

    if p[0] == 0:
        sql = "INSERT INTO diabetic (p_id, result) VALUES ('"+ pid +"', 'Not diabetic')"
        mycursor.execute(sql)
        mydb.commit()
        # print("Diabetic")
    else:
        sql = "INSERT INTO diabetic (p_id, result) VALUES ('"+ pid +"', 'Diabetic')"
        mycursor.execute(sql)
        mydb.commit()
        # print("Not")


app = Flask(__name__)

@app.route("/")
def home():
    return "<h1>Workss</h1>"


@app.route("/predict", methods=["POST"])
def login():
    if request.method == "POST":
        payload1 = request.args.get("symp1")
        payload2 = request.args.get("symp2")
        payload3 = request.args.get("symp3")
        payload4 = request.args.get("symp4")
        payload5 = request.args.get("symp5")
        pid = request.args.get("pid")
        randomforest(payload1, payload2, payload3, payload4, payload5, pid)
        
    
if __name__ == "__main__":
    app.run()