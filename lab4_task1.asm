.MODEL SMALL
.STACK 100H
.DATA
MSG DB 0AH,0DH,'THE SUM OF$'
MSG1 DB 'AND$'
MSG2 DB 'IS$'

.CODE

MAIN PROC
    MOV AX,@DATA
    MOV DS,AX
    
    MOV AH,2
    MOV DX,3FH
    INT 21H
    
    MOV AH,1
    INT 21H
    MOV BX,AX
    
    MOV AH,1
    INT 21H
    MOV CX,AX
    
    LEA DX,MSG
    MOV AH,9
    INT 21H
    
    MOV AH,2
    MOV DX,1FH
    INT 21H  
    
    MOV AH,2
    MOV DX,BX
    INT 21H 
    
    MOV AH,2
    MOV DX,1FH
    INT 21H
    
    LEA DX,MSG1
    MOV AH,9
    INT 21H  
    
    MOV AH,2
    MOV DX,1FH
    INT 21H
    
    MOV AH,2
    MOV DX,CX
    INT 21H 
    
    MOV AH,2
    MOV DX,1FH
    INT 21H
    
    LEA DX,MSG2
    MOV AH,9
    INT 21H 
    
    MOV AH,2
    MOV DX,1FH
    INT 21H
    
    ADD BX,CX
    SUB BX,48
    MOV AH,2
    MOV DX,BX
    INT 21H
    
    MOV AH,4CH
    INT 21H
    MAIN ENDP
END MAIN