from qrtools import QR

def Authentication(self,l):
        
        count =0
        myCode=QR(filename=u"/home/pi/Desktop/image.png")
        myCode.decode()
	n=myCode.data_to_string()
	print n
