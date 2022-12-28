from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from selenium import *
import sys
import json
import pandas as pd
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

keyCNN = sys.argv[1]

path = 'C:/Users/ASUS/Downloads/INSTALLER/chromedriver'
options = webdriver.ChromeOptions()
options.add_experimental_option('excludeSwitches', ['enable-logging'])
driver = webdriver.Chrome(executable_path = path, options = options, service = Service(ChromeDriverManager().install()))
driver2 = webdriver.Chrome(executable_path = path, options = options, service = Service(ChromeDriverManager().install()))
driver.get('https://www.google.com/search?q=cnnindonesia.com+' + keyCNN)

news = driver.find_elements(By.CLASS_NAME, 'MjjYud')

newsList = []

for new in news:
    cnnLink = new.find_element(By.TAG_NAME, 'a').get_attribute('href')

    if '.com/tag/' in cnnLink:
        continue
    else:
        driver2.get(cnnLink)
        cnnTitle = driver2.find_element(By.CSS_SELECTOR, 'h1.title').text
        cnnDate = driver2.find_element(By.CSS_SELECTOR, 'div.date').text
        cnnCategory = driver2.find_element(By.CSS_SELECTOR, 'a.gtm_breadcrumb_kanal').text
        if (cnnTitle != '' or cnnDate != '' or cnnCategory != ''):
            newsList.append([cnnTitle, cnnDate, cnnCategory])

print(json.dumps(newsList))