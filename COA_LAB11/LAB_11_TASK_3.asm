.MODEL SMALL
.STACK 100H
.DATA
STRING DB '123'
.CODE

MAIN PROC
    MOV AX,@DATA
    MOV DS,AX
    
    MOV SI,OFFSET STRING
    MOV CX,3
L1:
    MOV BX,[SI]
    PUSH BX
    INC SI
    LOOP L1

    MOV CX,3
L2:
    POP DX
    MOV AH,2
    INT 21H
    LOOP L2

EXIT:
MOV AH,4CH
INT 21H
MAIN ENDP
END  MAIN