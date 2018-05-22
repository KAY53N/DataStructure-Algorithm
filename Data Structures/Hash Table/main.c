//
//  main.c
//  hashTable
//
//  Created by kaysen on 2018/5/22.
//  Copyright © 2018年 kaysen. All rights reserved.
//

#include <stdio.h>
#include<stdlib.h>
#include <assert.h>


#define N 7

typedef struct HashNode{
    int m_data;
    struct HashNode *link;
} HashNode, *HashTable[N];

void init_htable(HashTable pht)
{
    for(int i=0; i<N; ++i)
    {
        pht[i] = NULL;
    }
}

int hash_maker(int key)
{
    return key % N;
}

void insert_elem_back(HashTable pht, const int val)
{
    int index = hash_maker(val);
    
    printf("======= %d \n", index);
    
    HashNode *new_node = (HashNode *) malloc(sizeof(HashNode));
    
    assert(new_node != NULL);
    
    new_node->m_data = val;
    
    new_node->link = NULL;
    
    if(pht[index] == NULL)
    {
        pht[index] = new_node;
    }
    else
    {
        HashNode *tmp = pht[index];
        while(tmp->link != NULL)
            tmp = tmp->link;
        tmp->link = new_node;
    }
}

void show_htable(HashTable pht)
{
    for(int i=0; i<N; ++i){
        printf("%d ", i);
        
        HashNode *tmp = pht[i];
        while(tmp != NULL){
            printf("%d->", tmp->m_data);
            tmp = tmp->link;
        }
        printf("NULL\n");
    }
}

void clear_htable(HashNode* tmp)
{
    while(tmp != NULL)
    {
        HashNode *next_tmp = tmp->link;
        free(tmp);
        tmp = tmp->link;
    }
}

void destroy_htable(HashTable pht)
{
    for(int i=0; i<N; ++i)
    {
        clear_htable(pht[i]);
    }
}

int main(int argc, const char * argv[])
{
    HashTable ht;
    
    memset(ht, NULL, sizeof(ht));;
    
    insert_elem_back(ht, 20);    //插入元素
    insert_elem_back(ht, 33);    //插入元素
    printf("*************************insert*****************************\n");
    
    show_htable(ht);
    
    //printf("*************************destroy*****************************\n");
    //destroy_htable(ht);
    
    //show_htable(ht);
    
    return 0;
}
