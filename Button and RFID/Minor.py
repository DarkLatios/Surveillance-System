import json
import requests
import RPi.GPIO as GPIO
import time
import os
from qrtools import QR



class Scrapper:

    def _init_(self):
        pass

    def Connection(self):
        print "Connecting To Server...."
        try:
            r=requests.get('http://192.168.0.100/getinfo.php',auth=('root',''))
            ans=r.json()
        except:
            print "Connection Failed ,System Error"
                    
        return ans


    def Processing(self,res):
        lis_ans=[]
        count =0
        for i in res:
            for x in res[i]:
                lis_ans.append(x.values())
        return lis_ans
        
    def image(self):
        GPIO.setup(8,GPIO.IN)
        GPIO.setup(7,GPIO.IN)
        pre=0
        while True:
            input=GPIO.input(8)
            if(not (pre) and input):
                print 'Button 1 is Pressed'
                os.system("fswebcam image.png")
                pre=input
                time.sleep(0.05)
        
    def Authentication(self,l):
        
        count =0
        myCode=QR(filename=u"/home/pi/image.png")
        n=myCode.decode()
        print n 
        for a in l:
            for x in a:
                if (x==n):
                    count+=1
        return count

    def Visual(self,val):
        
        GPIO.setmode(GPIO.BOARD)
        GPIO.setwarnings(False)
        GPIO.setup(7,GPIO.OUT)
        GPIO.setup(11,GPIO.OUT)
        if (val>0):
            print "Authorized"
            print "Green LED"
            GPIO.output(7,GPIO.HIGH)
            time.sleep(5)
            GPIO.output(7,GPIO.LOW)
        else:
            print "Error,Try Again"
            print "RED LED"
            GPIO.output(11,GPIO.HIGH)
            time.sleep(5)
            GPIO.output(11,GPIO.LOW)








wiz=Scrapper()
res=wiz.Connection()
l=wiz.Processing(res)
print "Place The QR Code...."
wiz.image()
val=wiz.Authentication(l)
wiz.Visual(val)

#app=[lis_ans.append(x.values()) for x in res[i] for i in res]

