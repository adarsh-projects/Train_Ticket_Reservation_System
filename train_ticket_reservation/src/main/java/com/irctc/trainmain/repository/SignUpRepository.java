package com.irctc.trainmain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.irctc.trainmain.model.SignUp;

public interface SignUpRepository extends JpaRepository<SignUp, String>{

}
