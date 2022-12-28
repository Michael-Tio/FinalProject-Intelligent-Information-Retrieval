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

path = 'C:/Users/62821/Chromedriver/chromedriver'
options = webdriver.ChromeOptions()
options.add_experimental_option('excludeSwitches', ['enable-logging'])
driver = webdriver.Chrome(executable_path = path, options = options, service = Service(ChromeDriverManager().install()))
driver2 = webdriver.Chrome(executable_path = path, options = options, service = Service(ChromeDriverManager().install()))
driver.get('https://www.google.com/search?q=cnnindonesia.com+' + keyCNN)

news = driver.find_elements(By.CLASS_NAME, 'MjjYud')

newsList = []

for new in news:
    cnnLink = new.find_element(By.TAG_NAME, 'a').get_attribute('href')
    if 'www.cnnindonesia.com/' in cnnLink:
        if '.com/tag/' in cnnLink:
            continue
        else:
            driver2.get(cnnLink)
            cnnTitle = driver2.find_element(By.XPATH, '//h1[@class="title"]').text
            cnnDate = driver2.find_element(By.XPATH, '//*[@class="date"]').text
            cnnCategory = driver2.find_element(By.XPATH, '//a[@class="gtm_breadcrumb_kanal"]').text
            if (cnnTitle != '' or cnnDate != '' or cnnCategory != ''):
                newsList.append([cnnTitle, cnnDate, cnnCategory])
            # print(cnnTitle)
            # print(cnnDate)
            # print(cnnCategory)

print(json.dumps(newsList))