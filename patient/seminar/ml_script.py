# import sys
# import pandas as pd
# import joblib
# import numpy as np

# from sklearn.model_selection import train_test_split

# from sklearn.preprocessing import StandardScaler
# from sklearn.linear_model import LogisticRegression
# from sklearn.svm import SVC
# from sklearn.ensemble import RandomForestClassifier
# from sklearn.pipeline import Pipeline
# # from flask import Flask, redirect, url_for, render_template, request, jsonify

# data = pd.read_csv('diabetes.csv')

# data.isnull().sum()

# data.describe()

# data_copy = data.copy(deep=True)

# data.columns

# data_copy[['Glucose', 'BloodPressure', 'SkinThickness', 'Insulin',
#        'BMI']] = data_copy[['Glucose', 'BloodPressure', 'SkinThickness', 'Insulin',
#        'BMI']].replace(0,np.nan)

# data_copy.isnull().sum()

# data['Glucose'] = data['Glucose'].replace(0,data['Glucose'].mean())
# data['BloodPressure'] = data['BloodPressure'].replace(0,data['BloodPressure'].mean())
# data['SkinThickness'] = data['SkinThickness'].replace(0,data['SkinThickness'].mean())
# data['Insulin'] = data['Insulin'].replace(0,data['Insulin'].mean())
# data['BMI'] = data['BMI'].replace(0,data['BMI'].mean())

# X = data[['Age', 'Glucose']]
# y = data['Outcome']

# X_train,X_test,y_train,y_test=train_test_split(X,y,test_size=0.2,
#                                                random_state=42)

# pipeline_lr  = Pipeline([('scalar1',StandardScaler()),
#                          ('lr_classifier',LogisticRegression())])

# pipeline_svc = Pipeline([('scalar2',StandardScaler()),
#                          ('svc_classifier',SVC())])

# pipeline_rf = Pipeline([('rf_classifier',RandomForestClassifier(max_depth=3))])

# pipelines = [pipeline_lr,
#             pipeline_svc,
#             pipeline_rf]

# pipelines

# for pipe in pipelines:
#     pipe.fit(X_train,y_train)

# pipe_dict = {0:'Logistic Regression',
#              1:'Support Vector Classifier',
#              2: 'Random Forest Classifier'}

# pipe_dict

# from sklearn.ensemble import RandomForestClassifier

# # X = data.drop('Outcome',axis=1)
# # y = data['Outcome']

# X = data[['Age', 'Glucose']]
# y = data['Outcome']

# rf =RandomForestClassifier(max_depth=3)
# rf=rf.fit(X,y)

# new_data = pd.DataFrame({
#     'Pregnancies':6,
#     'Glucose':148.0,
#     'BloodPressure':72.0,
#     'SkinThickness':35.0,
#     'Insulin':79.799479,
#     'BMI':33.6,
#     'DiabetesPedigreeFunction':0.627,
#     'Age':50,    
# },index=[0])    

# p = rf.predict(new_data)

# if p[0] == 0:
#     return "Diabetic"
# else:
#     return "Not"
# # Load the trained machine learning model
# # model = joblib.load('model.pkl')

# # Create a Pandas DataFrame with the input features
# data = pd.DataFrame({'feature1': [float(feature1)], 'feature2': [float(feature2)]})

# # Make a prediction using the machine learning model
# prediction = model.predict(data)

# # Print the prediction
# print(prediction[0])
import sys
import pandas as pd
from sklearn.linear_model import LogisticRegression

# Load the diabetes dataset
diabetes = pd.read_csv('diabetes.csv')

# Split the data into input (X) and output (y) variables
X = diabetes[['Age', 'Glucose']]
y = diabetes['Outcome']

# Fit a logistic regression model to the data
model = LogisticRegression()
model.fit(X, y)

# Predict the likelihood of diabetes for a given input
feature1 = 35
feature2 = 120
data = pd.DataFrame({'Age': [float(feature1)], 'Glucose': [float(feature2)]})
prediction = model.predict(data)
print(prediction[0])
