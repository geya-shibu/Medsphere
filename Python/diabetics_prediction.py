import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import csv


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

data = pd.read_csv('diabetes.csv')

data.head()

data.tail()

data.shape

data.info()

data.isnull().sum()

data.describe()

data_copy = data.copy(deep=True)

data.columns

data_copy[['Glucose', 'BloodPressure', 'SkinThickness', 'Insulin',
       'BMI']] = data_copy[['Glucose', 'BloodPressure', 'SkinThickness', 'Insulin',
       'BMI']].replace(0,np.nan)

data_copy.isnull().sum()

data['Glucose'] = data['Glucose'].replace(0,data['Glucose'].mean())
data['BloodPressure'] = data['BloodPressure'].replace(0,data['BloodPressure'].mean())
data['SkinThickness'] = data['SkinThickness'].replace(0,data['SkinThickness'].mean())
data['Insulin'] = data['Insulin'].replace(0,data['Insulin'].mean())
data['BMI'] = data['BMI'].replace(0,data['BMI'].mean())

X = data.drop('Outcome',axis=1)
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

for i,model in enumerate(pipelines):
    print("{} Train Accuracy:{}".format(pipe_dict[i],model.score(X_train,y_train)*100))

for i,model in enumerate(pipelines):
    print("{} Test Accuracy:{}".format(pipe_dict[i],model.score(X_test,y_test)*100))

from sklearn.ensemble import RandomForestClassifier

X = data.drop('Outcome',axis=1)
y = data['Outcome']

# fig = data.Outcome.value_counts().plot(kind='bar', color=['green','blue'])
# fig.set_xticklabels(['Diabetic', 'Non-Diabetic'])
# fig.set_ylabel('Count')
# plt.show()

rf =RandomForestClassifier(max_depth=3)

rf.fit(X,y)

new_data = pd.DataFrame({
    'Pregnancies':6,
    'Glucose':148.0,
    'BloodPressure':72.0,
    'SkinThickness':35.0,
    'Insulin':79.799479,
    'BMI':33.6,
    'DiabetesPedigreeFunction':0.627,
    'Age':50,    
},index=[0])

p = rf.predict(new_data)

# if p[0] == 0:
#     print('Non-diabetic')
# else:
#     print('Diabetic')

app = Flask(__name__)

@app.route("/")
def home():
    return "<h1>Works</h1>"


@app.route("/dicease", methods=["POST"])
def login():
    if request.method == "POST":
        payload = [request.args.get("symp1"), request.args.get("symp2"), request.args.get("symp3"), request.args.get("symp4"), request.args.get("symp5")]
        if(request.args.get("type") == "1"):
            return DecisionTree(payload)
        elif(request.args.get("type") == "2"):
            return randomforest(payload)
        elif(request.args.get("type") == "3"):
            return NaiveBayes(payload)
        else:
            return "Something wrong"